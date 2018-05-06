<template>
    <div>
        <md-dialog :md-active.sync="carAdd" class="form-dialog md-scrollbar">
            <car-add></car-add>
        </md-dialog>

        <md-dialog :md-active.sync="carEdit" class="form-dialog md-scrollbar">
            <car-edit :carId="carId"></car-edit>
        </md-dialog>

        <md-table class="table" v-model="searched" md-sort="name" md-sort-order="asc" md-card md-fixed-header>
            <md-table-toolbar>

                <md-button class="md-raised md-primary" @click="carAdd = true">
                    <span><md-icon>add</md-icon></span>
                    Додати автомобіль
                </md-button>

                <md-button class="md-raised md-primary" @click="fetchCars()">
                    <span><md-icon>refresh</md-icon></span>
                    Оновити
                </md-button>

                <md-field md-clearable class="md-toolbar-section-end search-input">
                    <md-input placeholder="Пошук..." v-model="search" @input="searchOnTable" />
                </md-field>
            </md-table-toolbar>

            <md-table-empty-state
                    md-label="Даних не знайдено"
                    :md-description="`Для запиту '${search}' не знайдено даних. Змініть запит або створіть новий автомобіль`">
            </md-table-empty-state>

            <md-table-row slot="md-table-row" slot-scope="{ item }">
                <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
                <md-table-cell md-label="Марка" md-sort-by="brand">{{ item.brand }}</md-table-cell>
                <md-table-cell md-label="Кузов" md-sort-by="body_type">{{ item.body_type }}</md-table-cell>
                <md-table-cell md-label="Двигун" md-sort-by="engine">{{ item.engine }}</md-table-cell>
                <md-table-cell md-label="Колір" md-sort-by="color">{{ item.color }}</md-table-cell>
                <md-table-cell md-label="Кор. передач" md-sort-by="transmission">{{ item.transmission }}</md-table-cell>
                <md-table-cell md-label="Рік випуску"
                               v-if="item.make_now === 0"
                               md-sort-by="production_year">{{ item.production_year }}</md-table-cell>
                <md-table-cell md-label="Рік випуску"
                               v-if="item.make_now === 1"
                               md-sort-by="production_year">Вигот.</md-table-cell>
                <md-table-cell md-label="Цех" md-sort-by="workshop_name">{{ item.workshop_name }}</md-table-cell>
                <md-table-cell md-label="Дії">
                    <md-button class="md-icon-button md-raised md-primary"
                               @click="edit(item.id)">
                        <md-icon>mode_edit</md-icon>
                        <md-tooltip md-delay="300">Редагувати</md-tooltip>
                    </md-button>
                    <md-button class="md-icon-button md-raised md-accent"
                               @click="deleteCar(item)">
                        <md-icon>remove</md-icon>
                        <md-tooltip md-delay="300">Видалити</md-tooltip>
                    </md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    import axios from 'axios';

    const toLower = text => {
        return text.toString().toLowerCase()
    };

    const searchByName = (items, term) => {
        if (term) {
            return items.filter(item => toLower(item.brand).includes(toLower(term)))
        }
        return items
    };

    export default {
        data: () => ({
            cars: [],
            searched: [],
            search: null,
            carAdd: false,
            carEdit: false,
            carId: '',
        }),
        created () {
            this.fetchCars();
            this.searched = this.cars;
        },
        methods: {
            searchOnTable () {
                this.searched = searchByName(this.cars, this.search)
            },
            fetchCars() {
                axios.get('/car').then((response) => {
                    this.cars = response.data.cars;
                    this.searched = response.data.cars;
                });
            },
            deleteCar(car) {
                axios.delete('/car/' + car.id).then(response => {
                    this.fetchCars();
                });
            },
            edit(id) {
                this.carId = id;
                this.carEdit = true;
            }
        },
    }
</script>

<style lang="scss">
    .form-dialog {
        padding: 30px;
        z-index: 100;
        max-width: 1100px;
        max-height: 600px;
        overflow: auto;
    }

    .search-input {
        margin-left: 600px;
    }
</style>