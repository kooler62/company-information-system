<template>
    <div>
        <md-table class="table" md-card>
            <md-table-toolbar>
                <md-field>
                    <label>Тип виробу</label>
                    <md-select>

                    </md-select>
                </md-field>


                <md-field>
                    <label>Іспитова лабораторія</label>
                    <md-select>

                    </md-select>
                </md-field>

                <label style="margin-right: 15px;">Період: </label>
                <md-datepicker v-model="dateStart"></md-datepicker>
                <md-datepicker v-model="dateEnd"></md-datepicker>

                <md-button class="md-raised md-accent">
                    <span><md-icon>undo</md-icon></span>
                    Скинути
                </md-button>
                <md-button class="md-raised md-primary">
                    <span><md-icon>done</md-icon></span>
                    Показати
                </md-button>
            </md-table-toolbar>
        </md-table>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: () => ({
            dateStart: null,
            dateEnd: null,
        })
    }

</script>

<style scoped>
    .md-field {
        width: 200px;
        margin-right: 10px;
    }
</style>