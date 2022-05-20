<script setup>
import Label from '@/Components/Label.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';
import MultipleDropdown from '@/Components/MultipleDropdown.vue';
import Button from '@/Components/Button.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import { ref, onMounted, reactive, watch } from 'vue';

const props = defineProps(['modelValue']);
const emit = defineEmits(['update:modelValue']);

let state = reactive({availableSpecialities: [], errors: []});

onMounted(() => {
    fetch('/api/specialities').then(async response => {
        var list = await response.json();
        state.availableSpecialities = list;
    });
});

watch(props.modelValue, (newValue, oldValue) => {
    if(props.modelValue.errors) {
        state.errors = props.modelValue.errors;
    } 
    emit('update:modelValue', {name: newValue.name, crm: newValue.crm, phone: newValue.phone, specialities: newValue.specialities});
});

function getErrorMessageFor(input) {
    console.log("erros chegando: ", props.modelValue.errors, state.errors);
    if(!props.modelValue.errors)
        return '';

    switch (input) {
        case 'name':
            if(props.modelValue.errors.hasOwnProperty('name') && props.modelValue.errors.name.length > 0){
                return props.modelValue.errors.name;
            }
            break;
        case 'crm':
            if(props.modelValue.errors.hasOwnProperty('crm') && props.modelValue.errors.crm.length > 0){
                return props.modelValue.errors.crm;
            }
            break;
        case 'phone':
            if(props.modelValue.errors.hasOwnProperty('phone') && props.modelValue.errors.phone.length > 0){
                return props.modelValue.errors.phone;
            }
            break;
        case 'specialities':
            if(props.modelValue.errors.hasOwnProperty('specialities') && props.modelValue.errors.specialities.length > 0){
                return props.modelValue.errors.specialities;
            }
            break;
        default:
            return '';
    }
}

</script>
<template>
    <div class="flex items-start justify-between">
        <div class="flex-initial">
            <Label value="Nome" />
            <Input name="name" v-model="modelValue.name" type="text" autofocus />
            <InputError :message="getErrorMessageFor('name')" />
        </div>
        <div class="flex-initial">
            <Label value="CRM" />
            <Input name="document" v-model="modelValue.crm" type="text" />
            <InputError :message="getErrorMessageFor('crm')" />
        </div>
        <div class="flex-initial">
            <Label value="Telefone" />
            <Input name="phone" v-model="modelValue.phone" type="text" />
            <InputError :message="getErrorMessageFor('phone')" />
        </div>
        <div class="flex-initial">
            <Label value="Especialidades" />
            <InputError :message="getErrorMessageFor('specialities')" />
            <MultipleDropdown v-model="modelValue.specialities" :options="state.availableSpecialities" placeholder="(selecione)" />
        </div>
    </div>
    <dic class="flex justify-end mt-10">
        <Button type="submit">
            Salvar
        </Button>
    </dic>
</template>