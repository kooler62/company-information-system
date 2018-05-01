<template>
    <div class="category-tabs">
        <md-tabs>
            <md-tab id="tab-transport" md-label="Всі вироби">
                <md-table md-card>
                    <md-table-toolbar>
                        <md-field>
                            <label>Цех</label>
                            <md-select v-model="workshop" multiple>
                                <md-option value="0">Всі</md-option>
                                <md-option v-for="workshop in workshops"
                                           :value="workshop.id">
                                    {{ workshop.workshop_name }}
                                </md-option>
                            </md-select>
                        </md-field>

                        <md-field>
                            <label>Категорія</label>
                            <md-select v-model="category" multiple>
                                <md-option value="1">Автомобілі</md-option>
                                <md-option value="2">Автобуси</md-option>
                                <md-option value="3">Мотоцикли</md-option>
                                <md-option value="4">Вантажівки</md-option>
                            </md-select>
                        </md-field>

                        <label style="margin-right: 15px;">Період: </label>
                        <md-datepicker v-model="dateStart"></md-datepicker>
                        <md-datepicker v-model="dateEnd"></md-datepicker>

                        <md-button class="md-raised md-accent">
                            <span><md-icon>undo</md-icon></span>
                            Скинути
                        </md-button>
                        <md-button class="md-raised md-primary" @click="getTransport">
                            <span><md-icon>done</md-icon></span>
                            Показати
                        </md-button>
                    </md-table-toolbar>

                    <md-table-empty-state
                            md-label="Даних не знайдено"
                            :md-description="`Для запиту '' не знайдено даних. Змініть запит або створіть новий автомобіль`">
                    </md-table-empty-state>

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

                    <md-table-row v-for="(item, index) in transport">
                        <md-table-cell>{{ index + 1 }}</md-table-cell>
                        <md-table-cell>{{ item.brand }}</md-table-cell>
                        <md-table-cell>{{ item.engine }}</md-table-cell>
                        <md-table-cell>{{ item.color }}</md-table-cell>
                        <md-table-cell>{{ item.production_year }}</md-table-cell>
                        <md-table-cell>{{ item.category }}</md-table-cell>
                        <md-table-cell>{{ item.workshop_name }}</md-table-cell>
                    </md-table-row>
                </md-table>

                </md-table>
            </md-tab>
            <md-tab id="tab-cars" md-label="Автомобілі">
                <car-list></car-list>
            </md-tab>
            <md-tab id="tab-buses" md-label="Автобуси">
                <bus-list></bus-list>
            </md-tab>
            <md-tab id="tab-motorcycles" md-label="Мотоцикли">
                <motorcycle-list></motorcycle-list>
            </md-tab>
            <md-tab id="tab-lorries" md-label="Вантажівки">
                <lorry-list></lorry-list>
            </md-tab>
            <md-tab id="tab-workshops" md-label="Цехи">
                <workshop-list></workshop-list>
            </md-tab>
        </md-tabs>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            workshops: [],
            transport: [],
            item: [],
            workshop: null,
            category: null,
            dateStart: null,
            dateEnd: null,
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
                axios.get('/transport/', {
                    params: {
                        workshop: this.workshop,
                        category: this.category,
                        dateStart: this.dateStart,
                        dateEnd: this.dateEnd,
                    },
                }).then(response => {
                    this.transport = response.data.transport;
                });
            },
        }
    }
</script>

<style scoped>
    .md-field {
        width: 200px;
        margin-right: 20px;
    }
</style>