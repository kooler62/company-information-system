<template>
    <div>
        <md-snackbar md-position="center"
                     :md-duration="5000"
                     :md-active.sync="showSnackBar"
                     md-persistent>
            <span>Успішно видалено</span>
            <md-button class="md-primary" @click="showSnackBar = false">Ок</md-button>
        </md-snackbar>

        <md-dialog :md-active.sync="brigadeAdd"
                   class="form-dialog md-scrollbar">
            <brigade-add></brigade-add>
        </md-dialog>

        <md-dialog :md-active.sync="brigadeEdit"
                   class="form-dialog md-scrollbar">
            <brigade-edit :brigadeId="brigadeId"></brigade-edit>
        </md-dialog>

        <md-table md-card>
            <md-table-toolbar>
                <h1 class="md-title">Бригади</h1>

                <md-button class="md-raised md-primary" @click="brigadeAdd= true">
                    <span><md-icon>add</md-icon></span>
                    Додати бригаду
                </md-button>

                <md-button class="md-raised md-primary" @click="fetchBrigades()">
                    <span><md-icon>refresh</md-icon></span>
                    Оновити
                </md-button>
            </md-table-toolbar>

            <md-table-row>
                <md-table-head md-numeric>№</md-table-head>
                <md-table-head>Назва</md-table-head>
                <md-table-head>Дії</md-table-head>
            </md-table-row>

            <md-table-row v-for="(brigade, index) in brigades">
                <md-table-cell md-numeric>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ brigade.brigade_name }}</md-table-cell>

                <md-table-cell>
                    <md-button class="md-icon-button md-raised md-primary">
                        <md-icon>mode_edit</md-icon>
                        <md-tooltip md-delay="200">Редагувати</md-tooltip>
                    </md-button>

                    <md-button class="md-icon-button md-raised md-accent" @click="deleteBrigade(brigade)">
                        <md-icon>remove</md-icon>
                        <md-tooltip md-delay="200">Видалити</md-tooltip>
                    </md-button>
                </md-table-cell>
            </md-table-row>

        </md-table>
    </div>
</template>

<script>
    import  axios from 'axios'

    export default {
        data: () => ({
            brigades: [],
            showSnackBar: false,
            brigadeAdd: null,
            brigadeEdit: null,
            brigadeId: null
        }),
        created() {
            this.fetchBrigades();
        },
        methods: {
            fetchBrigades() {
                axios.get('/brigade').then(response => {
                    this.brigades = response.data.brigades
                })
            },
            deleteBrigade(brigade) {
                axios.delete('/brigade/' + brigade.id);
                this.fetchBrigades();
                this.showSnackBar = true;
            }
        }
    }
</script>