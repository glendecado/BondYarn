<script setup>
import Sidebar from '@/Components/Sidebar.vue'
</script>

<template>
    <div class="flex bg-gradient-to-br from-gray-50 to-gray-100 h-dvh">
        <Sidebar />
        <main class="content h-dvh overflow-y-auto w-full">
            <div>asd</div>
            <slot />
        </main>
    </div>
</template>
