<template>
    <div class="ws-add">
        <span class="md-display-1">Додати Цех</span>
        <md-field>
            <label>Назва цеху</label>
            <md-input v-model="workshop.workshop_name" name="workshop_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>
        <md-field>
            <label>Іспитові Лабораторії</label>
            <md-select multiple>
                <md-option value="fight-club">Fight Club</md-option>
                <md-option value="godfather">Godfather</md-option>
                <md-option value="godfather-ii">Godfather II</md-option>
            </md-select>
        </md-field>
        <md-button class="md-raised md-accent" style="margin-left: 0" :to="{name: 'Transport'}">Назад</md-button>
        <md-button class="md-raised md-primary" v-on:click="createWorkshop()">Додати</md-button>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            workshops: [],
            workshop: {
                id: '',
                workshop_name: '',
            },
            selectedMovies: [],
        }),
        methods: {
            createWorkshop() {
                axios.post('/workshop', this.workshop).then(response => {
                    this.workshops.push(response.data.workshop);
                    alert("Успішно додано");
                }).catch(error => {
                    console.log(error.message);
                })
            },
        }
    }
</script>