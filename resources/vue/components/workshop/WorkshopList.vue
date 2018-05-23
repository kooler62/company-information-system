<template>
    <div class="workshops">
        <md-dialog :md-active.sync="workshopAdd" class="form-dialog md-scrollbar">
            <workshop-add></workshop-add>
        </md-dialog>

        <md-dialog :md-active.sync="workshopEdit" class="form-dialog md-scrollbar">
            <workshop-edit :workshopId="workshopId"></workshop-edit>
        </md-dialog>

        <md-dialog :md-active.sync="showMastersList" class="form-dialog md-scrollbar">
            <md-card v-for="master in masters">
                <md-card-header>
                    <md-card-header-text>
                        <div class="md-title">
                            {{ master.first_name }}
                            {{ master.last_name }}
                        </div>
                        <div class="md-subhead">{{ master.category }}</div>
                        <div class="md-subhead">{{ master.position }}</div>
                    </md-card-header-text>

                    <md-card-media>
                        <img src="/assets/examples/avatar-2.jpg" alt="Avatar">
                    </md-card-media>
                </md-card-header>
            </md-card>

            <md-dialog-actions>
                <md-button class="md-primary"
                           @click="showMastersList = false">
                    Закрити
                </md-button>
            </md-dialog-actions>
        </md-dialog>

        <md-dialog :md-active.sync="showBossesList" class="form-dialog md-scrollbar">
            <md-card v-for="boss in bosses">
                <md-card-header>
                    <md-card-header-text>
                        <div class="md-title">
                            {{ boss.first_name }}
                            {{ boss.last_name }}
                        </div>
                        <div class="md-subhead">{{ boss.category }}</div>
                        <div class="md-subhead">{{ boss.position }}</div>
                    </md-card-header-text>

                    <md-card-media>
                        <img src="/assets/examples/avatar-2.jpg" alt="Avatar">
                    </md-card-media>
                </md-card-header>
            </md-card>

            <md-dialog-actions>
                <md-button class="md-primary"
                           @click="showBossesList = false">
                    Закрити
                </md-button>
            </md-dialog-actions>
        </md-dialog>

        <md-table class="table" md-card>

            <md-table-toolbar>
                <md-button class="md-raised md-primary" @click="workshopAdd = true">
                    <span><md-icon>add</md-icon></span>
                    Додати цех
                </md-button>
                <md-button class="md-raised md-primary" @click="fetchWorkshops()">
                    <span><md-icon>refresh</md-icon></span>
                    Оновити
                </md-button>
            </md-table-toolbar>

            <md-table-row>
                <md-table-head>№</md-table-head>
                <md-table-head>Назва</md-table-head>
                <md-table-head>Кількість автомобілів</md-table-head>
                <md-table-head>Інформація</md-table-head>
                <md-table-head>Дії</md-table-head>
            </md-table-row>

            <md-table-row v-for="(workshop, index) in workshops">
                <md-table-cell>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ workshop.workshop_name }}</md-table-cell>
                <md-table-cell>3</md-table-cell>
                <md-table-cell>
                    <md-button class="md-primary"
                               @click="fetchMastersList(workshop.id)">
                        <span>
                            <md-icon>list</md-icon>
                        </span>
                        Список майстрів
                    </md-button>
                    <md-button class="md-primary"
                               @click="fetchBossList(workshop.id)">
                        <span>
                            <md-icon>list</md-icon>
                        </span>
                        Начальники
                    </md-button>
                </md-table-cell>
                <md-table-cell>
                    <md-button class="md-icon-button md-raised md-primary" @click="edit(workshop.id)">
                        <span>
                            <md-icon>mode_edit</md-icon>
                        </span>
                    </md-button>
                    <md-button class="md-icon-button md-raised md-accent"
                               @click="deleteWorkshop(workshop)">
                        <span>
                            <md-icon>remove</md-icon>
                        </span>
                    </md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            workshops: [],
            workshop: [],
            workshopAdd: false,
            workshopEdit: false,
            workshopId: '',
            showMastersList: false,
            showBossesList: false,
            masters: [],
            bosses: []
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
            deleteWorkshop(workshop) {
                axios.delete('/workshop/' + workshop.id).then(response => {
                    let index = this.workshop.indexOf(workshop);
                    this.workshops.splice(index, 1);
                })
            },
            edit(id) {
                this.workshopId = id;
                this.workshopEdit = true;
            },
            fetchMastersList(id) {
                axios.get(`/workshop/${id}/masters`).then((response) => {
                    this.masters = response.data.masters;
                });
                this.showMastersList = true;
            },
            fetchBossList(id) {
                axios.get(`/workshop/${id}/boss`).then((response) => {
                    this.bosses = response.data.bosses;
                });
                this.showBossesList = true;
            }
        }
    }
</script>

<style scoped>
    .md-dialog .md-card {
        width: 320px;
        margin: 4px;
        display: inline-block;
    }
</style>