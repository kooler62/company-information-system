<template>
    <div>
        <md-snackbar md-position="center"
                     :md-duration="5000"
                     :md-active.sync="showSnackBar"
                     md-persistent>
            <span>Успішно видалено</span>
            <md-button class="md-primary" @click="showSnackBar = false">Ок</md-button>
        </md-snackbar>

        <md-dialog :md-active.sync="testLabAdd"
                   class="form-dialog md-scrollbar">

        </md-dialog>

        <md-dialog :md-active.sync="testLabEdit"
                   class="form-dialog md-scrollbar">

        </md-dialog>

        <md-table md-card>
            <md-table-toolbar>
                <h1 class="md-title">Іспитові лабораторії</h1>

                <md-button class="md-raised md-primary" >
                    <span><md-icon>add</md-icon></span>
                    Додати лабораторію
                </md-button>

                <md-button class="md-raised md-primary" >
                    <span><md-icon>refresh</md-icon></span>
                    Оновити
                </md-button>
            </md-table-toolbar>

            <md-table-row>
                <md-table-head md-numeric>№</md-table-head>
                <md-table-head>Назва</md-table-head>
                <md-table-head>Дії</md-table-head>
            </md-table-row>

            <md-table-row v-for="(testLab, index) in testLabs">
                <md-table-cell md-numeric>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ testLab.name }}</md-table-cell>

                <md-table-cell>
                    <md-button class="md-icon-button md-raised md-primary">
                        <md-icon>mode_edit</md-icon>
                        <md-tooltip md-delay="200">Редагувати</md-tooltip>
                    </md-button>

                    <md-button class="md-icon-button md-raised md-accent">
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
            testLabs: [],
            showSnackBar: false,
            testLabAdd: null,
            testLabEdit: null,
            testLabId: null
        }),
        created() {
            this.fetchTestLabs();
        },
        methods: {
            fetchTestLabs() {
                axios.get('/test-labs').then(response => {
                    this.testLabs = response.data.testLabs
                })
            },
            deleteTestLab(testLab) {
                axios.delete('/test-labs/' + testLab.id);
                this.fetchBrigades();
                this.showSnackBar = true;
            }
        }
    }
</script>