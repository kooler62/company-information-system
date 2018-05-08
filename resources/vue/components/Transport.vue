<template>
    <div class="category-tabs">
        <md-tabs>
            <md-tab id="tab-test" md-label="Випробування">
                <transport-test></transport-test>
            </md-tab>
            <md-tab id="tab-transport" md-label="Виробництво">
                <transport-production></transport-production>
            </md-tab>
            <md-tab id="tab-cars" md-label="Автомобілі">
                <car-list></car-list>
            </md-tab>
            <md-tab id="tab-buses" md-label="Автобуси">
                <bus-list></bus-list>
            </md-tab>
            <md-tab id="tab-motorcycles" md-label="Мотоцикли">
                <motorcycle-list></motorcycle-list>
            </md-tab>
            <md-tab id="tab-lorries" md-label="Вантажівки">
                <lorry-list></lorry-list>
            </md-tab>
            <md-tab id="tab-workshops" md-label="Цехи">
                <workshop-list></workshop-list>
            </md-tab>
        </md-tabs>
    </div>
</template>