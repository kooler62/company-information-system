<template>
    <div class="ws-edit">
        <span class="md-display-1">Редагування</span>

        <md-field>
            <label>Назва цеху</label>
            <md-input v-model="workshop.workshop_name" name="workshop_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-button class="md-raised md-accent" style="margin-left: 0" :to="{name: 'Transport'}">Назад</md-button>
        <md-button class="md-raised md-primary" v-on:click="updateCar()">Зберегти</md-button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                workshops: [],
                workshop: {}
            }
        },
        created() {
            this.fetchWorkshops();
        },
        methods: {
            updateCar: function() {
                let uri = '/workshop/' + this.$route.params.id;
                axios.put(uri, this.workshop).then((response) => {
                    this.$router.push({name: 'Transport'})
                })
            }
        }
    }
</script>