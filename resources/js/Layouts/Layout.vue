<script setup>
import Sidebar from '@/Components/Sidebar.vue'
</script>

<template>
    <div>
        <Sidebar />
        <main class="content">
            <div>asd</div>
            <slot />
        </main>
    </div>
</template>
