<template>
    <div>
        <md-snackbar md-position="center"
                     :md-duration="5000"
                     :md-active.sync="showSnackBar"
                     md-persistent>
            <span>Успішно видалено</span>
            <md-button class="md-primary" @click="showSnackBar = false">Ок</md-button>
        </md-snackbar>

        <md-dialog :md-active.sync="workerAdd"
                   class="form-dialog md-scrollbar">
            <worker-add></worker-add>
        </md-dialog>

        <md-dialog :md-active.sync="workerEdit"
                   class="form-dialog md-scrollbar">
            <worker-edit :workerId="workerId"></worker-edit>
        </md-dialog>

        <md-table v-model="searched" md-sort="name" md-sort-order="asc" md-card md-fixed-header>
            <md-table-toolbar>

                <md-field>
                    <label>Цех</label>
                    <md-select v-model="selectedWorkshops"
                               multiple>
                        <md-option v-for="workshop in workshops"
                                   :value="workshop.id">
                            {{ workshop.workshop_name }}
                        </md-option>
                    </md-select>
                </md-field>

                <md-field>
                    <label>Категорія</label>
                    <md-select v-model="selectedCategories"
                               multiple>
                        <md-option value="Збирачі">Збирачі</md-option>
                        <md-option value="Токарі">Токарі</md-option>
                        <md-option value="Слюсарі">Слюсарі</md-option>
                        <md-option value="Зварники">Зварники</md-option>
                    </md-select>
                </md-field>

                <md-field>
                    <label>Бригада</label>
                    <md-select>
                        <md-option v-for="brigade in brigades"
                                   :value="brigade.id">
                            {{brigade.brigade_name}}
                        </md-option>
                    </md-select>
                </md-field>

                <md-button class="md-raised md-primary">
                <span>
                    <md-icon>done</md-icon>
                </span>
                    Застосувати
                </md-button>

                <md-button class="md-raised md-primary"
                           @click="workerAdd = true">
                    <span>
                        <md-icon>add</md-icon>
                    </span>
                    Додати робітника
                </md-button>

                <md-field md-clearable class="md-toolbar-section-end" style="margin-left: 20px;">
                    <md-input placeholder="Пошук по прізвищу..." v-model="search" @input="searchOnTable" />
                </md-field>
            </md-table-toolbar>

            <md-table-empty-state
                    md-label="Даних не знайдено"
                    :md-description="`Для запиту '${search}' не знайдено даних. Змініть запит або додайте робітників`">
            </md-table-empty-state>

            <md-table-row slot="md-table-row" slot-scope="{ item }">
                <md-table-cell md-label="Прізвище" md-sort-by="last_name">{{ item.last_name }}</md-table-cell>
                <md-table-cell md-label="Ім'я" md-sort-by="first_name">{{ item.first_name }}</md-table-cell>
                <md-table-cell md-label="Дата пр. на роботу" md-sort-by="employment_date">{{ item.employment_date }}</md-table-cell>

                <md-table-cell md-label="Категорія" md-sort-by="last_name">{{ item.category }}</md-table-cell>
                <md-table-cell md-label="Цех" md-sort-by="last_name">{{ item.workshop_name }}</md-table-cell>
                <md-table-cell md-label="Бригада" md-sort-by="last_name">sd</md-table-cell>

                <md-table-cell md-label="Фото">
                    <img class="md-avatar" src="/assets/examples/avatar-2.jpg" alt="Avatar">
                </md-table-cell>

                <md-table-cell md-label="Дії">
                    <md-button class="md-icon-button md-raised md-primary"
                               @click="edit(item.id)">
                        <md-icon>mode_edit</md-icon>
                        <md-tooltip md-delay="200">Редагувати</md-tooltip>
                    </md-button>

                    <md-button class="md-icon-button md-raised md-accent"
                               @click="deleteWorker(item)">
                        <md-icon>remove</md-icon>
                        <md-tooltip md-delay="200">Видалити</md-tooltip>
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
            return items.filter(item => toLower(item.last_name).includes(toLower(term)))
        }
        return items
    };

    export default {
        data: () => ({
            workshops: [],
            workers: [],
            brigades: [],
            selectedCategories: null,
            selectedWorkshops: null,
            showSnackBar: false,
            workerAdd: false,
            workerEdit: false,
            workerId: null,
            search: null,
            searched: [],
        }),
        created() {
            this.fetchWorkshops();
            this.fetchWorkers();
            this.fetchBrigades();
        },
        methods: {
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
            fetchWorkers() {
                axios.get('/worker').then(response => {
                    this.workers = response.data.workers;
                    this.searched= response.data.workers;
                });

            },
            fetchBrigades() {
                axios.get('/brigade').then(response => {
                    this.brigades = response.data.brigades;
                })
            },
            searchOnTable () {
                this.searched = searchByName(this.workers, this.search)
            },
            deleteWorker(worker) {
                axios.delete('/worker/' + worker.id);
                this.fetchWorkers();
                this.showSnackBar = true;
            },
            edit(id) {
                this.workerId = id;
                this.workerEdit = true;
            },
        },
    }
</script>

<style scoped>
    .md-field {
        width: 180px;
        margin-right: 10px;
    }

    .md-title {
        font-size: 19px;
    }

    .form-dialog {
        padding: 30px;
        z-index: 100;
        width: 1100px;
        max-height: 600px;
        overflow: auto;
    }
</style>