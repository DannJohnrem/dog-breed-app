<template>
    <div>
        <div v-if="likedDogs && likedDogs.length === 0" class="text-gray-500">
            You have not liked any dogs yet.
        </div>

        <div v-else>
            <div v-for="dog in likedDogs" :key="dog.id">
                <!-- Display the liked dog here -->
                <img :src="dog.image" alt="Dog" />
                <span>{{ dog.breed }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        likedDogs: {
            type: Array,
            default: () => [],
        },
    },
}
</script>
