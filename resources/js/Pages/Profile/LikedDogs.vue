<template>
    <div>
        <h1 class="mb-4 text-2xl font-bold">Your Liked Dogs</h1>
        <div v-if="likedDogs.length === 0" class="text-gray-500">You have not liked any dogs yet.</div>
        <div v-else class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
            <div v-for="dog in likedDogs" :key="dog.id" class="p-4 border rounded">
                <img :src="dog.image" alt="Dog image" class="object-cover w-full h-48 mb-2">
                <h2 class="text-xl font-semibold">{{ dog.breed }}</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        likedDogs: Array,
    },
}
</script>
