<template>
    <div>
        <md-table class="table" md-card>
            <md-table-toolbar>
                <md-field>
                    <label>Цех</label>
                    <md-select v-model="selectedWorkshops"
                               @md-closed="getTransport"
                               multiple>
                        <md-option v-for="workshop in workshops"
                                   :value="workshop.id">
                            {{ workshop.workshop_name }}
                        </md-option>
                    </md-select>
                </md-field>

                <md-field>
                    <label>Категорія</label>
                    <md-select v-model="categories" multiple>
                        <md-option value="1">Автомобілі</md-option>
                        <md-option value="2">Автобуси</md-option>
                        <md-option value="3">Мотоцикли</md-option>
                        <md-option value="4">Вантажівки</md-option>
                    </md-select>
                </md-field>

                <label style="margin-right: 15px;">Період: </label>
                <md-datepicker v-model="dateStart"></md-datepicker>
                <md-datepicker v-model="dateEnd"></md-datepicker>

                <md-checkbox v-model="makeNow"
                             @change="getTransport"
                             title="Виготовляється зараз">
                    Вир. зараз
                </md-checkbox>

                <md-button class="md-raised md-accent">
                    <span><md-icon>undo</md-icon></span>
                    Скинути
                </md-button>
                <md-button class="md-raised md-primary"
                           @click="getTransport">
                    <span><md-icon>done</md-icon></span>
                    Показати
                </md-button>
            </md-table-toolbar>

            <md-table md-card>

                <md-table-row>
                    <md-table-cell>№</md-table-cell>
                    <md-table-cell>Марка</md-table-cell>
                    <md-table-cell>Двигун</md-table-cell>
                    <md-table-cell>Колір</md-table-cell>
                    <md-table-cell>Дата випуску</md-table-cell>
                    <md-table-cell>Категорія</md-table-cell>
                    <md-table-cell>Цех</md-table-cell>
                </md-table-row>

                <md-table-row v-if="categories.indexOf('1') !== -1"
                              v-for="(item, index) in cars">
                    <md-table-cell>{{ index + 1 }}</md-table-cell>
                    <md-table-cell>{{ item.brand }}</md-table-cell>
                    <md-table-cell>{{ item.engine }}</md-table-cell>
                    <md-table-cell>{{ item.color }}</md-table-cell>
                    <md-table-cell>{{ item.production_year }}</md-table-cell>
                    <md-table-cell>Автомобілі</md-table-cell>
                    <md-table-cell>{{ item.workshop_id }}</md-table-cell>
                </md-table-row>

                <md-table-row v-if="categories.indexOf('3') !== -1"
                              v-for="(item, index) in motorcycles">
                    <md-table-cell>{{ index + 1 }}</md-table-cell>
                    <md-table-cell>{{ item.brand }}</md-table-cell>
                    <md-table-cell>{{ item.engine }}</md-table-cell>
                    <md-table-cell>{{ item.color }}</md-table-cell>
                    <md-table-cell>{{ item.production_year }}</md-table-cell>
                    <md-table-cell>Автобуси</md-table-cell>
                    <md-table-cell>{{ item.workshop_id }}</md-table-cell>
                </md-table-row>

                <md-table-row v-if="categories.indexOf('4') !== -1"
                              v-for="(item, index) in lorries">
                    <md-table-cell>{{ index + 1 }}</md-table-cell>
                    <md-table-cell>{{ item.brand }}</md-table-cell>
                    <md-table-cell>{{ item.engine }}</md-table-cell>
                    <md-table-cell>{{ item.color }}</md-table-cell>
                    <md-table-cell>{{ item.production_year }}</md-table-cell>
                    <md-table-cell>Мотоцикли</md-table-cell>
                    <md-table-cell>{{ item.workshop_id }}</md-table-cell>
                </md-table-row>

                <md-table-row v-if="categories.indexOf('2') !== -1"
                              v-for="(item, index) in buses">
                    <md-table-cell>{{ index + 1 }}</md-table-cell>
                    <md-table-cell>{{ item.brand }}</md-table-cell>
                    <md-table-cell>{{ item.engine }}</md-table-cell>
                    <md-table-cell>{{ item.color }}</md-table-cell>
                    <md-table-cell>{{ item.production_year }}</md-table-cell>
                    <md-table-cell>Вантажівки</md-table-cell>
                    <md-table-cell>{{ item.workshop_id }}</md-table-cell>
                </md-table-row>
            </md-table>

        </md-table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            workshops: [],
            cars: [],
            buses: [],
            motorcycles: [],
            lorries: [],
            item: [],
            selectedWorkshops: null,
            categories: null,
            dateStart: null,
            dateEnd: null,
            makeNow: false,
            testLab: null
        }),
        created() {
            this.fetchWorkshops();
        },
        methods: {
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
            getTransport() {
                this.cars = this.buses = [];
                axios.get('/transport/', {
                    params: {
                        workshops: this.selectedWorkshops,
                        makeNow: this.makeNow ? 1 : 0,
                        dateStart: this.dateStart,
                        dateEnd: this.dateEnd,
                    },
                }).then(response => {
                    this.cars = response.data.cars;
                    this.buses = response.data.buses;
                    this.motorcycles = response.data.motorcycles;
                    this.lorries = response.data.lorries;
                });
            },
        }
    }
</script>

<style scoped>
    .md-field {
        width: 200px;
        margin-right: 10px;
    }
</style>