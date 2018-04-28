<template>
    <div class="lorry-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />

        <span class="md-display-1">Додати вантажівку</span>

        <md-field>
            <label>Марка</label>
            <md-input v-model="lorry.brand"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Двигун</label>
            <md-input v-model="lorry.engine"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Колір</label>
            <md-input v-model="lorry.color"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Коробка передач</label>
            <md-select v-model="lorry.transmission" name="transmission">
                <md-option value="Механіка">Механіка</md-option>
                <md-option value="Автомат">Автомат</md-option>
                <md-option value="Типтронік">Типтронік</md-option>
                <md-option value="Адаптивна">Адаптивна</md-option>
                <md-option value="Варіатор">Варіатор</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Дата випуску</label>
            <md-input v-model="lorry.production_year" ></md-input>
            <span class="md-helper-text">yyyy-mm-dd</span>
        </md-field>

        <md-field>
            <label>Колесна база</label>
            <md-input v-model="lorry.wheel" ></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Самоскид</label>
            <md-select v-model="lorry.dump_truck" name="transmission">
                <md-option value="Механіка">Назад</md-option>
                <md-option value="Автомат">Вправо</md-option>
                <md-option value="Типтронік">Вліво</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Вантажопідйомність</label>
            <md-input v-model="lorry.carrying" ></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-checkbox v-model="lorry.make_now" value="1">Виготовляється зараз?</md-checkbox>

        <md-field>
            <label>Цех</label>
            <md-select v-model="lorry.workshop_id" name="workshop_id">
                <md-option v-for="workshop in workshops" :value="workshop.id">{{ workshop.workshop_name }}</md-option>
            </md-select>
        </md-field>

        <md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary" @click="createLorry()">Додати</md-button>

    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data: () => ({
            lorries: [],
            workshops: [],
            lorry: {},
            added: false,
        }),
        created() {
            this.fetchWorkshops();
        },
        methods: {
            createLorry() {
                axios.post('/lorry', this.lorry).then(response => {
                    this.lorries.push(response.data.lorry);
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