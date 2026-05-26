<template>
    <Loader />
    <RouterView />
</template>

<script setup lang="ts">
import Loader from '~/components/Loader.vue'
import { RouterView } from 'vue-router'
import { useRouter } from 'vue-router'
import { useLayout } from '~/stores/layout'
import { useAuth } from '~/composables/useAuth'
import { preline } from '~/utils/preline'
import { onMounted } from 'vue'

const router = useRouter()

const { isAuthenticated } = useAuth()

if (!isAuthenticated.value) {
    router.replace('/auth/sign-in')
}

const layoutStore = useLayout()

onMounted(() => {
    preline.init()
})
</script>
