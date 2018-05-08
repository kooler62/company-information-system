<template>
    <div>
        <md-snackbar md-position="center"
                     :md-duration="5000"
                     :md-active.sync="showSnackbar"
                     md-persistent>
            <span>Успішно видалено</span>
            <md-button class="md-primary" @click="showSnackbar = false">Ок</md-button>
        </md-snackbar>

        <md-table style="margin-bottom: 5px;">
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
                    <md-select>
                        <md-option value="0">Всі</md-option>
                        <md-option value="1">Інженери</md-option>
                        <md-option value="1">Технологи</md-option>
                        <md-option value="1">Техніки</md-option>
                    </md-select>
                </md-field>

                <md-button class="md-raised md-primary">
                <span>
                    <md-icon>add</md-icon>
                </span>
                    Додати інженера
                </md-button>
                <md-button class="md-raised md-primary"
                           @click="fetchEngineers">
                <span>
                    <md-icon>refresh</md-icon>
                </span>
                    Оновити
                </md-button>
            </md-table-toolbar>
        </md-table>

        <md-card v-for="engineer in engineers">
            <md-card-header>
                <md-card-header-text>
                    <div class="md-title">
                        {{ engineer.first_name }}
                        {{ engineer.last_name }}
                    </div>
                    <div class="md-subhead">{{ engineer.category }}</div>
                    <div class="md-subhead">{{ engineer.position }}</div>
                </md-card-header-text>

                <md-card-media>
                    <img src="/assets/examples/avatar-2.jpg" alt="Avatar">
                </md-card-media>
            </md-card-header>

            <md-card-actions>
                <md-button>Редагувати</md-button>
                <md-button @click="deleteEngineer(engineer)">Видалити</md-button>
            </md-card-actions>
        </md-card>

    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: () => ({
            workshops: [],
            engineers: [],
            engineer: {},
            showSnackbar: false,
        }),
        created() {
            this.fetchEngineers();
            this.fetchWorkshops();
        },
        methods: {
            fetchEngineers() {
                axios.get('/engineer').then((response) => {
                    this.engineers = response.data.engineers;
                })
            },
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
            deleteEngineer(engineer) {
                axios.delete('/engineer/' + engineer.id).then(response => {
                    this.fetchEngineers();

                });
                this.showSnackbar = true;
            },
        }
    }
</script>

<style scoped>
    .md-card {
        width: 320px;
        margin: 4px;
        display: inline-block;
    }

    .md-field {
        width: 200px;
        margin-right: 10px;
    }

    .md-title {
        font-size: 19px;
    }
</style>