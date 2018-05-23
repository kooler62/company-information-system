<template>
    <div class="car-edit">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="edited"
                md-title="Збережено!"
                md-content="Ваші дані успішно оновлено" />

        <span class="md-display-1">Редагування</span>

        <md-field>
            <label>Марка автомобіля</label>
            <md-input v-model="car.brand"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Кузов</label>
            <md-select v-model="car.body_type">
                <md-option value="Седан">Седан</md-option>
                <md-option value="Позашляховик">Позашляховик</md-option>
                <md-option value="Кроссовер">Кроссовер</md-option>
                <md-option value="Універсал">Універсал</md-option>
                <md-option value="Купе">Купе</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Двигун</label>
            <md-input v-model="car.engine"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Колір</label>
            <md-input v-model="car.color"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Коробка передач</label>
            <md-select v-model="car.transmission">
                <md-option value="Механіка">Механіка</md-option>
                <md-option value="Автомат">Автомат</md-option>
                <md-option value="Типтронік">Типтронік</md-option>
                <md-option value="Адаптивна">Адаптивна</md-option>
                <md-option value="Варіатор">Варіатор</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Дата випуску</label>
            <md-input v-model="car.production_year" ></md-input>
            <span class="md-helper-text">yyyy-mm-dd</span>
        </md-field>

        <md-checkbox v-model="car.make_now">Виготовляється зараз?</md-checkbox>

        <md-field>
            <md-select v-model="car.workshop_id" title="Цех">
                <md-option v-for="workshop in workshops"
                        :value="workshop.id">
                    {{ workshop.workshop_name }}
                </md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Іспитові лабораторії</label>
            <md-select v-model="car.selectedTestLabs" multiple>
                <md-option v-for="testLab in testLabs" :value="testLab.id">{{ testLab.name }}</md-option>
            </md-select>
        </md-field>

        <div class="buttons">
            <md-button class="md-raised md-accent">
                <span><md-icon>arrow_back</md-icon></span>
                Назад
            </md-button>
            <md-button class="md-raised md-primary" @click="updateCar()">
                <span><md-icon>done</md-icon></span>
                Зберегти
            </md-button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['carId'],
        data: () => ({
            workshops: [],
            testLabs: [],
            workshop: {},
            car: {},
            edited: false,
        }),
        created() {
            this.fetchCar();
            this.fetchWorkshops();
            this.fetchTestLabs();
        },
        methods: {
            fetchCar() {
                let uri = '/car/' + this.carId;
                axios.get(uri).then(response => {
                    this.car = response.data.car;
                    this.car.selectedTestLabs = response.data.selectedTestLabs;
                    this.testLabs = response.data.testLabs;
                });
            },
            updateCar() {
                let uri = '/car/' + this.carId;
                axios.put(uri, this.car);
                this.edited = true;
            },
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
            fetchTestLabs() {
                axios.get('/test-labs').then(response => {
                    this.testLabs = response.data.testLabs;
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