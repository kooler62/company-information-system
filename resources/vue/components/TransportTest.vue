<template>
    <div>
        <md-table class="table" md-card>
            <md-table-toolbar>
                <md-field>
                    <label>Тип виробу</label>
                    <md-select v-model="selectedTypes" multiple>
                        <md-option :value="1">Автомобілі</md-option>
                        <md-option :value="2">Автобуси</md-option>
                        <md-option :value="3">Мотоцикли</md-option>
                        <md-option :value="4">Вантажівки</md-option>
                    </md-select>
                </md-field>

                <md-field>
                    <label>Іспитова лабораторія</label>
                    <md-select v-model="selectedTestLabs" multiple>
                        <md-option v-for="testLab in testLabs" :value="testLab.id">
                            {{testLab.name}}
                        </md-option>
                    </md-select>
                </md-field>

                <md-button class="md-raised md-accent">
                    <span><md-icon>undo</md-icon></span>
                    Скинути
                </md-button>
                <md-button class="md-raised md-primary" @click="fetchTransport">
                    <span><md-icon>done</md-icon></span>
                    Застосувати
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

                <md-table-row>

                </md-table-row>
            </md-table>
        </md-table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            selectedTypes: [],
            selectedTestLabs: [],
            testLabs: [],
            cars: [],
            buses: [],
            motorcycles: [],
            lorries: []
        }),
        created() {
            this.fetchTestLabs();
        },
        methods: {
            fetchTestLabs() {
                axios.get('/test-labs').then(response => {
                    this.testLabs = response.data.testLabs;
                })
            },
            fetchTransport() {
                axios.get('/transport/by-test-labs', {
                    params: {
                        testLabs: this.selectedTestLabs,
                    }
                }).then((response) => {
                    this.cars = response.data.cars;
                    this.buses = response.data.buses;
                    this.motorcycles = response.data.motorcycles;
                    this.lorries = response.data.lorries;
                })
            }
        }
    }

</script>

<style scoped>
    .md-field {
        width: 200px;
        margin-right: 10px;
    }
</style>