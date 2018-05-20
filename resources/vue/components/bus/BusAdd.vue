<template>
    <div class="car-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />

        <span class="md-display-1">Додати автобус</span>

        <md-field>
            <label>Марка автобуса</label>
            <md-input v-model="bus.brand"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Кількість місць</label>
            <md-input v-model="bus.man_capacity"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Двигун</label>
            <md-input v-model="bus.engine"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Колір</label>
            <md-input v-model="bus.color"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Коробка передач</label>
            <md-select v-model="bus.transmission" name="transmission">
                <md-option value="Механіка">Механіка</md-option>
                <md-option value="Автомат">Автомат</md-option>
                <md-option value="Типтронік">Типтронік</md-option>
                <md-option value="Адаптивна">Адаптивна</md-option>
                <md-option value="Варіатор">Варіатор</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Дата випуску</label>
            <md-input v-model="bus.production_year" ></md-input>
            <span class="md-helper-text">yyyy-mm-dd</span>
        </md-field>

        <md-checkbox v-model="bus.make_now">Виготовляється зараз?</md-checkbox>

        <md-field>
            <label>Цех</label>
            <md-select v-model="bus.workshop_id" name="workshop_id">
                <md-option v-for="workshop in workshops" :value="workshop.id">{{ workshop.workshop_name }}</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Іспитові лабораторії</label>
            <md-select v-model="bus.test_labs" multiple>
                <md-option v-for="testLab in testLabs" :value="testLab.id">{{ testLab.name }}</md-option>
            </md-select>
        </md-field>

        <md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary" @click="createBus()">Додати</md-button>

    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data: () => ({
            buses: [],
            workshops: [],
            testLabs: [],
            bus: {},
            added: false,
        }),
        created() {
            this.fetchWorkshops();
        },
        methods: {
            createBus() {
                if (this.bus.make_now) this.bus.make_now = 1;
                else this.bus.make_now = 0;
                axios.post('/bus', this.bus).then(response => {
                    this.buses.push(response.data.bus);
                    this.added = true;
                }).catch(error => {
                    console.log(error.message);
                })
            },
            fetchWorkshops() {
                axios.get('/workshop', this.workshop).then(response => {
                    this.workshops = response.data.workshops;
                    console.log(this.workshops);
                })
            }
        }
    }
</script>

<style lang="scss">
    .md-select-menu {
        z-index: 200;
    }
    .dialog-alert {
        z-index: 999;
    }
</style>