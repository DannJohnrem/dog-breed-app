<template>
    <AuthenticatedLayout>
        <template #header>
            Dog Breeds
        </template>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
            <div v-for="dog in dogs" :key="dog.breed" class="p-4 border rounded">
                <img :src="dog.image" alt="Dog image" class="object-cover w-full h-48 mb-2">
                <h2 class="text-xl font-semibold">{{ dog.breed }}</h2>
                <button @click="likeDog(dog)" class="w-full py-2 mt-2 text-white bg-blue-500 rounded">
                    Like this dog
                </button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';

// Define props directly
defineProps({
    dogs: Array,
});

const likeDog = (dog) => {
    console.log('Dog being liked:', dog);
    console.log(route('like.dog'));
    console.log('Dog ID:', dog.id);

    axios.post(route('like.dog'), { dog_id: dog.breed })
        .then((response) => {
            alert(response.data.message);
        })
        .catch((error) => {
            alert(error.response.data.message);
        });
};
</script>
