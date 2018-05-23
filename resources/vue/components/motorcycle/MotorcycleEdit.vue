<template>
    <div class="bus-edit">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="edited"
                md-title="Збережено!"
                md-content="Ваші дані успішно оновлено" />

        <span class="md-display-1">Редагування</span>

        <md-field>
            <label>Марка мотоцикла</label>
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

        <md-checkbox v-model="motorcycle.stroller" value="1">З коляскою?</md-checkbox>
        <md-checkbox v-model="motorcycle.make_now" value="1">Виготовляється зараз?</md-checkbox>

        <md-field>
            <md-select v-model="motorcycle.workshop_id" title="Цех">
                <md-option v-for="workshop in workshops"
                        :value="workshop.id">
                    {{ workshop.workshop_name }}
                </md-option>
            </md-select>
        </md-field>

        <md-button class="md-raised md-accent">Назад</md-button>
        <md-button class="md-raised md-primary" @click="updateMotorcycle()">Зберегти</md-button>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['motorcycleId'],
        data: () => ({
            workshops: [],
            workshop: {},
            motorcycle: {},
            edited: false,
        }),
        created() {
            this.fetchMotorcycle();
            this.fetchWorkshops();
        },
        methods: {
            fetchMotorcycle() {
                axios.get('/motorcycle/' + this.motorcycleId).then(response => {
                    this.motorcycle = response.data;
                })
            },
            updateMotorcycle() {
                axios.put('/motorcycle/' + this.motorcycleId, this.motorcycle);
                this.edited = true;
            },
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
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