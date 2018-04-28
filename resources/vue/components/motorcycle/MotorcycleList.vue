<template>
    <div class="motorcycles">
        <md-table>
            <md-table-toolbar style="padding: 0;">
                <md-button class="md-raised md-primary" :to="{name: 'MotorcycleAdd'}" style="margin-right: 700px;">
                    <span><md-icon>add</md-icon></span>
                    Додати мотоцикл
                </md-button>
            </md-table-toolbar>

            <md-table-row>
                <md-table-head>№</md-table-head>
                <md-table-head>Марка</md-table-head>
                <md-table-head>Двигун</md-table-head>
                <md-table-head>Колір</md-table-head>
                <md-table-head>Коробка передач</md-table-head>
                <md-table-head>Рік випуску</md-table-head>
                <md-table-head>З коляскою?</md-table-head>
                <md-table-head>Цех</md-table-head>
                <md-table-head>Дії</md-table-head>
            </md-table-row>

            <md-table-row v-for="(motorcycle, index) in motorcycles">
                <md-table-cell>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ motorcycle.brand }}</md-table-cell>
                <md-table-cell>{{ motorcycle.engine }}</md-table-cell>
                <md-table-cell>{{ motorcycle.color }}</md-table-cell>
                <md-table-cell>{{ motorcycle.transmission }}</md-table-cell>
                <md-table-cell>{{ motorcycle.production_year }}</md-table-cell>
                <md-table-cell>{{ motorcycle.stroller }}</md-table-cell>
                <md-table-cell>{{ motorcycle.workshop_name }}</md-table-cell>
                <md-table-cell>
                    <md-button class="md-icon-button md-raised md-primary"
                               :to="{name: 'MortorcycleEdit', params: {id: motorcycle.id}}">
                        <md-icon>mode_edit</md-icon>
                    </md-button>
                    <md-button class="md-icon-button md-raised md-accent"
                                v-on:click="deleteMotorcycle(motorcycle)">
                        <md-icon>remove</md-icon>
                    </md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                motorcycle: [],
                motorcycles: []
            }
        },
        created() {
            this.fetchMotorcycles();
        },
        methods: {
            fetchMotorcycles() {
                axios.get('/motorcycle').then((response) => {
                    this.motorcycles = response.data.motorcycles;
                });
            },
            deleteMotorcycle(motorcycle) {
                axios.delete('/motorcycle/' + motorcycle.id).then(response => {
                    let index = this.motorcycle.indexOf(motorcycle);
                    this.motorcycles.splice(index, 1);
                });
            }
        },
    }
</script>
