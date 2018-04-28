<template>
    <div class="car-add">
        <span class="md-display-1">Додати мотоцикл</span>

        <md-field>
            <label>Марка</label>
            <md-input v-model="motorcycle.brand"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Двигун</label>
            <md-input v-model="motorcycle.engine"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Колір</label>
            <md-input v-model="motorcycle.color"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Коробка передач</label>
            <md-select v-model="motorcycle.transmission" name="transmission">
                <md-option value="Механіка">Механіка</md-option>
                <md-option value="Автомат">Автомат</md-option>
                <md-option value="Типтронік">Типтронік</md-option>
                <md-option value="Адаптивна">Адаптивна</md-option>
                <md-option value="Варіатор">Варіатор</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Дата випуску</label>
            <md-input v-model="motorcycle.production_year" ></md-input>
            <span class="md-helper-text">yyyy-mm-dd</span>
        </md-field>

        <md-checkbox v-model="motorcycle.stroller">З коляскою?</md-checkbox>

        <md-checkbox v-model="motorcycle.make_now">Виготовляється зараз?</md-checkbox>

        <md-field>
            <label>Цех</label>
            <md-select v-model="motorcycle.workshop_id" name="workshop_id">
                <md-option v-for="workshop in workshops" :value="workshop.id">{{ workshop.workshop_name }}</md-option>
            </md-select>
        </md-field>

        <md-button class="md-raised md-accent" style="margin-left: 0" :to="{name: 'Transport'}">Назад</md-button>
        <md-button class="md-raised md-primary" v-on:click="createMotorcycle()">Додати</md-button>

    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                motorcycles: [],
                workshops: [],
                edit: false,
                type: 'date',
                workshop: {
                    id: '',
                    workshop_name: '',
                },
                motorcycle: {
                    brand: '',
                    engine: '',
                    color: '',
                    transmission: '',
                    production_year: '',
                    stroller: 0,
                    make_now: 0,
                    workshop_id: '',
                },
            }
        },
        created() {
            this.fetchWorkshops();
        },
        methods: {
            createMotorcycle() {
                axios.post('/motorcycle', this.motorcycle).then(response => {
                    this.motorcycles.push(response.data.motorcycle);
                    alert("Успішно додано");
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
