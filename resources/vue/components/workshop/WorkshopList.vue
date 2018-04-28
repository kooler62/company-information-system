<template>
    <div class="workshops">
        <md-button class="md-raised md-primary" :to="{name: 'WorkshopAdd'}">
            <span><md-icon>add</md-icon></span>
            Додати цех
        </md-button>
        <md-table>
            <md-table-row>
                <md-table-head>№</md-table-head>
                <md-table-head>Назва</md-table-head>
                <md-table-head>Кількість автомобілів</md-table-head>
            </md-table-row>

            <md-table-row v-for="(workshop, index) in workshops">
                <md-table-cell>{{ index + 1 }}</md-table-cell>
                <md-table-cell>{{ workshop.workshop_name }}</md-table-cell>
                <md-table-cell>3</md-table-cell>
                <md-table-cell>
                <md-button class="md-icon-button md-raised md-primary" :to="{name: 'WorkshopEdit', params: {id: workshop.id}}">
                    <md-icon>mode_edit</md-icon>
                </md-button>
                <md-button class="md-icon-button md-raised md-accent" v-on:click="deleteWorkshop(workshop)">
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
                workshop: [],
                workshops: {
                    'id': '',
                    'workshop_name': ''
                }
            }
        },
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
            }
        }
    }
</script>