<template>
    <div class="car-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />

        <span class="md-display-1">Додати автомобіль</span>

        <form>

        <md-field>
            <label>Марка автомобіля</label>
            <md-input v-model="car.brand" required></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Кузов</label>
            <md-select v-model="car.body_type" required name="body-type">
                <md-option value="Седан">Седан</md-option>
                <md-option value="Позашляховик">Позашляховик</md-option>
                <md-option value="Кроссовер">Кроссовер</md-option>
                <md-option value="Універсал">Універсал</md-option>
                <md-option value="Купе">Купе</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Двигун</label>
            <md-input v-model="car.engine" required></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Колір</label>
            <md-input v-model="car.color" required></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Коробка передач</label>
            <md-select v-model="car.transmission" name="transmission" required>
                <md-option value="Механіка">Механіка</md-option>
                <md-option value="Автомат">Автомат</md-option>
                <md-option value="Типтронік">Типтронік</md-option>
                <md-option value="Адаптивна">Адаптивна</md-option>
                <md-option value="Варіатор">Варіатор</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Дата випуску</label>
            <md-input v-model="car.production_year" required pattern="^\d{4}-\d{2}-\d{2}$"></md-input>
            <span class="md-helper-text">yyyy-mm-dd</span>
        </md-field>

        <md-checkbox v-model="car.make_now">Виготовляється зараз?</md-checkbox>

        <md-field>
            <label>Цех</label>
            <md-select v-model="car.workshop_id" name="workshop_id" required>
                <md-option v-for="workshop in workshops" :value="workshop.id">{{ workshop.workshop_name }}</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Іспитові лабораторії</label>
            <md-select v-model="car.test_labs" multiple>
                <md-option v-for="testLab in testLabs" :value="testLab.id">{{ testLab.name }}</md-option>
            </md-select>
        </md-field>

        <div class="buttons">
            <md-button class="md-raised md-accent">
                <span><md-icon>arrow_back</md-icon></span>
                Назад
            </md-button>
            <md-button class="md-raised md-primary" type="submit" @click="createCar()">
                <span><md-icon>done</md-icon></span>
                Додати
            </md-button>
        </div>

        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data: () => ({
            cars: [],
            workshops: [],
            car: {},
            added: false,
            testLabs: []
        }),
        created() {
            this.fetchWorkshops();
            this.fetchTestLabs();
        },
        methods: {
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
            createCar() {
                if (this.car.make_now) this.car.make_now = 1;
                else this.car.make_now = 0;
                axios.post('/car', this.car).then(response => {
                    this.cars.push(response.data.car);
                    this.added = true;
                    this.fetchCars();
                    this.car = {};
                }).catch(error => {
                    console.log(error.message);
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
