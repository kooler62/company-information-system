<template>
    <div>
        <md-snackbar md-position="center"
                     :md-duration="5000"
                     :md-active.sync="showSnackBar"
                     md-persistent>
            <span>Успішно видалено</span>
            <md-button class="md-primary" @click="showSnackBar = false">Ок</md-button>
        </md-snackbar>

        <md-dialog :md-active.sync="add"
                   class="form-dialog md-scrollbar">
            <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />

            <span class="md-display-1">Додати іспитову лабораторію</span>

            <md-field>
                <label>Назва</label>
                <md-input v-model="form.name"></md-input>
            </md-field>

            <div class="buttons">
                <md-button class="md-raised md-primary" @click="addTestLab">
                    Додати
                </md-button>
            </div>

        </md-dialog>

        <md-dialog :md-active.sync="edit"
                   class="form-dialog md-scrollbar">

                   <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="edited"
                md-title="Додано!"
                md-content="Ваші дані успішно оновлено" />

            <span class="md-display-1">Редагування</span>

            <md-field>
                <label>Назва</label>
                <md-input v-model="form.name"></md-input>
            </md-field>

            <div class="buttons">
                <md-button class="md-raised md-primary" @click="editTestLab">
                    Зберегти
                </md-button>
            </div>

        </md-dialog>

        <md-table md-card>
            <md-table-toolbar>
                <h1 class="md-title">Іспитові лабораторії</h1>

                <md-button class="md-raised md-primary" @click="add = true">
                    <span><md-icon>add</md-icon></span>
                    Додати лабораторію
                </md-button>

                <md-button class="md-raised md-primary" @click="fetchTestLabs">
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
                    <md-button class="md-icon-button md-raised md-primary" @click="showEditForm(testLab.id)">
                        <md-icon>mode_edit</md-icon>
                        <md-tooltip md-delay="200">Редагувати</md-tooltip>
                    </md-button>

                    <md-button class="md-icon-button md-raised md-accent" @click="deleteTestLab(testLab.id)">
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
            add: null,
            edit: null,
            added: false,
            edited: false,
            testLabId: null,
            form: {}
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
            deleteTestLab(id) {
                axios.delete('/test-labs/' + id).then((response) => {
                    this.fetchTestLabs();
                });
                this.showSnackBar = true;
            },
            addTestLab() {
                axios.post('/test-labs', this.form).then((response) => {
                    this.fetchTestLabs();
                    this.added = true;
                })
            },
            showEditForm(id) {
                axios.get('/test-labs/' + id).then((response) => {
                    this.testLabId = id;
                    this.form = response.data;
                    this.edit = true;
                })
            },
            editTestLab() {
                axios.put('/test-labs/' + this.testLabId, this.form).then((response) => {
                    this.fetchTestLabs();
                })
            }
        }
    }
</script>

<style scoped>
    .form-dialog {
        padding: 30px;
        z-index: 100;
        width: 1100px;
        max-height: 600px;
        overflow: auto;
    }
</style>