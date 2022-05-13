<script setup>
import {ref} from 'vue';

let show = ref(false);

defineProps(['message']);

onMounted(() => {
    if(message) {
        show = true;
        setTimeout(() => {
            show = false;
        }, 2000);
    }
});
</script>

<template>
    <div v-show="show" class="p-6 w-full mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
        <div class="shrink-0">
            <!-- <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo"> -->
        </div>
        <div>
            <!-- <div class="text-xl font-medium text-black">ChitChat</div> -->
            <p class="text-slate-500">{{ message }}</p>
        </div>
    </div>
</template>
