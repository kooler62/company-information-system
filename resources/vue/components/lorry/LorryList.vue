<template>
    <div>
        <md-table>
            <md-table-toolbar>
                <md-button class="md-raised md-primary" :to="{name: 'LorryAdd'}" style="margin-right: 700px;">
                    <span><md-icon>add</md-icon></span>
                    Додати вантажівку
                </md-button>
            </md-table-toolbar>

            <md-table-row>
                <md-table-head>№</md-table-head>
                <md-table-head>Марка</md-table-head>
                <md-table-head>Двигун</md-table-head>
                <md-table-head>Колір</md-table-head>
                <md-table-head>Кор. передач</md-table-head>
                <md-table-head>Рік випуску</md-table-head>
                <md-table-head>Колесна база</md-table-head>
                <md-table-head>Самоскид</md-table-head>
                <md-table-head>Вантажопідйомність</md-table-head>
                <md-table-head>Цех</md-table-head>
                <md-table-head>Дії</md-table-head>
            </md-table-row>

            <md-table-row v-for="(lorry, index) in lorries">
                <md-table-cell>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ lorry.brand }}</md-table-cell>
                <md-table-cell>{{ lorry.engine }}</md-table-cell>
                <md-table-cell>{{ lorry.color }}</md-table-cell>
                <md-table-cell>{{ lorry.transmission }}</md-table-cell>
                <md-table-cell>{{ lorry.production_year }}</md-table-cell>
                <md-table-cell>{{ lorry.wheel }}</md-table-cell>
                <md-table-cell>{{ lorry.dump_truck }}</md-table-cell>
                <md-table-cell>{{ lorry.carrying }}</md-table-cell>
                <md-table-cell>{{ lorry.workshop_name }}</md-table-cell>
                <md-table-cell>
                    <md-button class="md-icon-button md-raised md-primary"
                               :to="{name: 'LorryEdit', params: {id: lorry.id}}">
                        <md-icon>mode_edit</md-icon>
                    </md-button>
                    <md-button class="md-icon-button md-raised md-accent"
                               v-on:click="deleteLorry(lorry)">
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
        data: () => ({
            lorry: [],
            lorries: [],
        }),
        created () {
            this.fetchLorries();
        },
        methods: {
            searchOnTable () {
                this.searched = searchByName(this.lorries, this.search)
            },
            fetchLorries() {
                axios.get('/lorry').then((response) => {
                    this.lorries = response.data.lorries;
                });
            },
            deleteLorry(lorry) {
                axios.delete('/lorry/' + lorry.id).then(response => {
                    let index = this.lorry.indexOf(lorry);
                    this.lorries.splice(index, 1);
                });
            },
        },
    }
</script>