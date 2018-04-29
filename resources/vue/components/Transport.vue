<template>
    <div class="category-tabs">
        <md-tabs>
            <md-tab id="tab-transport" md-label="Всі вироби">
                <md-table md-card>
                    <md-table-toolbar>
                        <md-field>
                            <label>Цех</label>
                            <md-select>
                                <md-option value="0">Всі</md-option>
                                <md-option v-for="workshop in workshops"
                                           :value="workshop.id">
                                    {{ workshop.workshop_name }}
                                </md-option>
                            </md-select>
                        </md-field>

                        <md-field>
                            <label>Категорія</label>
                            <md-select v-model="category">
                                <md-option value="1">Автомобілі</md-option>
                                <md-option value="2">Автобуси</md-option>
                                <md-option value="3">Мотоцикли</md-option>
                                <md-option value="4">Вантажівки</md-option>
                            </md-select>
                        </md-field>

                        <label style="margin-right: 15px;">Період: </label>
                        <md-datepicker v-model="width"></md-datepicker>
                        <md-datepicker v-model="on"></md-datepicker>

                        <md-button class="md-raised md-accent">
                            <span><md-icon>undo</md-icon></span>
                            Скинути
                        </md-button>
                        <md-button class="md-raised md-primary" @click="dateConvert">
                            <span><md-icon>done</md-icon></span>
                            Показати
                        </md-button>
                    </md-table-toolbar>

                    <md-table md-card>
                        <md-table-toolbar>
                            <h1 class="md-title">Автомобілі</h1>
                        </md-table-toolbar>

                        <md-table-row>
                            <md-table-head md-numeric>ID</md-table-head>
                            <md-table-head>Name</md-table-head>
                            <md-table-head>Email</md-table-head>
                            <md-table-head>Gender</md-table-head>
                            <md-table-head>Job Title</md-table-head>
                        </md-table-row>

                        <md-table-row>
                            <md-table-cell md-numeric>1</md-table-cell>
                            <md-table-cell>Shawna Dubbin</md-table-cell>
                            <md-table-cell>sdubbin0@geocities.com</md-table-cell>
                            <md-table-cell>Male</md-table-cell>
                            <md-table-cell>Assistant Media Planner</md-table-cell>
                        </md-table-row>

                        <md-table-row>
                            <md-table-cell md-numeric>2</md-table-cell>
                            <md-table-cell>Odette Demageard</md-table-cell>
                            <md-table-cell>odemageard1@spotify.com</md-table-cell>
                            <md-table-cell>Female</md-table-cell>
                            <md-table-cell>Account Coordinator</md-table-cell>
                        </md-table-row>

                        <md-table-row>
                            <md-table-cell md-numeric>3</md-table-cell>
                            <md-table-cell>Vera Taleworth</md-table-cell>
                            <md-table-cell>vtaleworth2@google.ca</md-table-cell>
                            <md-table-cell>Male</md-table-cell>
                            <md-table-cell>Community Outreach Specialist</md-table-cell>
                        </md-table-row>
                    </md-table>

                    <md-table md-card>
                        <md-table-toolbar>
                            <h1 class="md-title">Вантажівки</h1>
                        </md-table-toolbar>

                        <md-table-row>
                            <md-table-head md-numeric>ID</md-table-head>
                            <md-table-head>Name</md-table-head>
                            <md-table-head>Email</md-table-head>
                            <md-table-head>Gender</md-table-head>
                            <md-table-head>Job Title</md-table-head>
                        </md-table-row>

                        <md-table-row>
                            <md-table-cell md-numeric>1</md-table-cell>
                            <md-table-cell>Shawna Dubbin</md-table-cell>
                            <md-table-cell>sdubbin0@geocities.com</md-table-cell>
                            <md-table-cell>Male</md-table-cell>
                            <md-table-cell>Assistant Media Planner</md-table-cell>
                        </md-table-row>

                        <md-table-row>
                            <md-table-cell md-numeric>2</md-table-cell>
                            <md-table-cell>Odette Demageard</md-table-cell>
                            <md-table-cell>odemageard1@spotify.com</md-table-cell>
                            <md-table-cell>Female</md-table-cell>
                            <md-table-cell>Account Coordinator</md-table-cell>
                        </md-table-row>

                        <md-table-row>
                            <md-table-cell md-numeric>3</md-table-cell>
                            <md-table-cell>Vera Taleworth</md-table-cell>
                            <md-table-cell>vtaleworth2@google.ca</md-table-cell>
                            <md-table-cell>Male</md-table-cell>
                            <md-table-cell>Community Outreach Specialist</md-table-cell>
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
            category: '',
            width: null,
            on: null,
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
            dateConvert(date) {
                return date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear();
            }
        }
    }
</script>

<style scoped>
    .md-field {
        width: 200px;
        margin-right: 20px;
    }
</style>