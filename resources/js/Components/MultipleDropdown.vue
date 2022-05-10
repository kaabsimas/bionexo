<script setup>
import {onMounted, reactive} from 'vue';

const props = defineProps({
    modelValue: Array,
    options: Array,
    placeholder: String
});

const state = reactive({
    specialities: []
});

const emit = defineEmits(['update:modelValue']);

onMounted(() => {
    state.specialities = props.modelValue;
});

function addValue(event) {
    const select = event.target;
    if(!state.specialities.find(i => i.id == select.value)) {
        var aux = {id:select.value, text:select[select.selectedIndex].text};

        state.specialities.push(aux);
    }

    select.selectedIndex = 0;
    emit('update:modelValue', state.specialities);
}

function removeValue(event) {
    const button = event.target;
    var itemToRemove = undefined,
        currentListSet = state.specialities;

    if(itemToRemove = currentListSet.find(i => i.id == button.dataset.id)) {
        currentListSet.splice(currentListSet.indexOf(itemToRemove), 1);
        state.specialities = currentListSet;
    }
    emit('update:modelValue', state.specialities);
}
</script>

<template>
    <div>
        <select @change="addValue" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option>{{ placeholder }}</option>
            <option v-for="option in options" :key="option.id" :value="option.id">
                {{option.name}}
            </option>
        </select>
        <div class="flex flex-col overflow-y-scroll w-50 h-32">
            <div 
                v-for="speciality in state.specialities" 
                :key="speciality.id" 
                :data-id="speciality.id"
                class="p-2 border-gray-200 cursor-pointer hover:bg-red-300"
                @click="removeValue"
            >
                {{speciality.text}} 
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>