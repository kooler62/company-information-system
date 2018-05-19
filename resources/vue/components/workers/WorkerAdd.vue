<template>
    <div class="worker-add">
        <md-dialog-alert
                class="dialog-alert"
                :md-active.sync="added"
                md-title="Додано!"
                md-content="Ваші дані успішно внесено до бази даних" />

        <span class="md-display-1">Додати робітника</span>

        <md-field>
            <label>Прізвище</label>
            <md-input v-model="form.last_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Ім'я</label>
            <md-input v-model="form.first_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>По батькові</label>
            <md-input v-model="form.middle_name"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Номер телефону</label>
            <md-input v-model="form.phone_number"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Персональний номер</label>
            <md-input v-model="form.personal_number"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Дом. адреса</label>
            <md-input v-model="form.home_address"></md-input>
            <span class="md-helper-text"></span>
        </md-field>

        <md-field>
            <label>Категорія</label>
            <md-select v-model="form.category">
                <md-option value="Збирач">Збирач</md-option>
                <md-option value="Токар">Токар</md-option>
                <md-option value="Слюсар">Слюсар</md-option>
                <md-option value="Зварник">Зварник</md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Дата прийняття на роботу</label>
            <md-input v-model="form.employment_date"></md-input>
            <span class="md-helper-text">yyyy-mm-dd</span>
        </md-field>

        <md-field>
            <label>Бригада</label>
            <md-select v-model="form.brigade_id">
                <md-option v-for="brigade in brigades" :value="brigade.id">
                    {{ brigade.brigade_name }}
                </md-option>
            </md-select>
        </md-field>

        <md-field>
            <label>Цех</label>
            <md-select v-model="form.workshop_id">
                <md-option v-for="workshop in workshops" :value="workshop.id">
                    {{ workshop.workshop_name }}
                </md-option>
            </md-select>
        </md-field>

        <div class="buttons">
            <md-button class="md-raised md-accent">
                <span><md-icon>arrow_back</md-icon></span>
                Назад
            </md-button>
            <md-button class="md-raised md-primary" @click="addWorker()">
                <span><md-icon>done</md-icon></span>
                Додати
            </md-button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data: () => ({
            added: false,
            form: {
                is_brigadier: 0
            },
            brigades: [],
            workshops: [],
        }),
        created() {
            this.fetchBrigades();
            this.fetchWorkshops();
        },
        methods: {
            fetchBrigades() {
                axios.get('/brigade').then(response => {
                    this.brigades = response.data.brigades;
                })
            },
            fetchWorkshops() {
                axios.get('/workshop').then(response => {
                    this.workshops = response.data.workshops;
                })
            },
            addWorker() {
                axios.post('/worker', this.form).then(response => {
                    this.added = true;
                    this.fetchWorkers();
                })
            }
        }
    }
</script>

<style lang="scss">
    .md-select-menu {
        z-index: 200;
    }

    .dialog-alert {
        z-index: 999;
    }
</style>