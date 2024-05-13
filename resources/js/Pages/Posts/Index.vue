<script setup>
    import { Link, useForm } from '@inertiajs/vue3'
    import DangerButton from '@/Components/DangerButton.vue'

    defineProps({
        posts: Array,
    })

    const form = useForm({})

    const deletePost = (post) => {
        form.delete(route('posts.destroy', post))
    }
</script>

<template>
    <div>
        <nav class="bg-green-800 text-gray-50 h-16">
            <ul class="flex justify-end items-center space-x-6 container mx-auto pr-6 h-full">
                <li>
                    <Link :href="route('posts.index')" class="hover:text-green-600">
                        Posts
                    </Link>
                </li>
                <li>
                    <Link :href="route('posts.trashed')" class="hover:text-green-600">
                        Trashed
                    </Link>
                </li>
            </ul>
        </nav>

        <main class="container mx-auto my-6 px-6">
            <p>Untrashed Posts</p>
            <section class="w-3/4 mx-auto">
                <div class="flex flex-col space-y-3">
                    <div class="border border-black rounded p-6" v-for="(post, index) in posts" :key="index">
                        <p class="italic">#: {{ post.id }}</p>
                        <p class="italic">by: {{ post.user.name }}</p>
                        <p class="font-semibold">{{ post.title }}</p>
                        <p>
                            {{ post.body }}
                        </p>
                        <form @submit.prevent="deletePost(post)">
                            <div class="flex justify-end mt-4">
                                <DangerButton type="submit">
                                    Delete
                                </DangerButton>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>
