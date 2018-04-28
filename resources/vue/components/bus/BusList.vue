<template>
    <div class="buses">
        <md-dialog :md-active.sync="busAdd" class="form-dialog md-scrollbar">
            <bus-add></bus-add>
        </md-dialog>

        <md-dialog :md-active.sync="busEdit" class="form-dialog md-scrollbar">
            <bus-edit :busId="busId"></bus-edit>
        </md-dialog>

        <md-table md-card>
            <md-table-toolbar>
                <md-button class="md-raised md-primary" @click="busAdd = true">
                    <span><md-icon>add</md-icon></span>
                    Додати автобус
                </md-button>

                <md-button class="md-raised md-primary" @click="fetchBuses()">
                    <span><md-icon>refresh</md-icon></span>
                    Оновити
                </md-button>
            </md-table-toolbar>

            <md-table-row>
                <md-table-head>№</md-table-head>
                <md-table-head>Марка</md-table-head>
                <md-table-head>Двигун</md-table-head>
                <md-table-head>Колір</md-table-head>
                <md-table-head>Коробка передач</md-table-head>
                <md-table-head>Рік випуску</md-table-head>
                <md-table-head>Кількість пасажирів</md-table-head>
                <md-table-head>Цех</md-table-head>
                <md-table-head>Дії</md-table-head>
            </md-table-row>

            <md-table-row v-for="(bus, index) in buses">
                <md-table-cell>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ bus.brand }}</md-table-cell>
                <md-table-cell>{{ bus.engine }}</md-table-cell>
                <md-table-cell>{{ bus.color }}</md-table-cell>
                <md-table-cell>{{ bus.transmission }}</md-table-cell>
                <md-table-cell>{{ bus.production_year }}</md-table-cell>
                <md-table-cell>{{ bus.man_capacity }}</md-table-cell>
                <md-table-cell>{{ bus.workshop_name }}</md-table-cell>
                <md-table-cell>
                    <md-button class="md-icon-button md-raised md-primary" @click="edit(bus.id)">
                        <md-icon >mode_edit</md-icon>
                    </md-button>
                    <md-button class="md-icon-button md-raised md-accent"
                               v-on:click="deleteBus(bus)">
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
            bus: [],
            buses: [],
            busAdd: false,
            busEdit: false,
            busId: ''
        }),
        created() {
            this.fetchBuses();
        },
        methods: {
            fetchBuses() {
                axios.get('/bus').then((response) => {
                    this.buses = response.data.buses;
                });
            },
            deleteBus(bus) {
                axios.delete('/bus/' + bus.id).then(response => {
                    let index = this.bus.indexOf(bus);
                    this.buses.splice(index, 1);
                });
            },
            edit(id) {
                this.busId = id;
                this.busEdit = true;
            }
        },
    }
</script>

<style lang="scss">
    .form-dialog {
        padding: 30px;
        z-index: 100;
        width: 1100px;
        max-height: 600px;
        overflow: auto;
    }
</style>