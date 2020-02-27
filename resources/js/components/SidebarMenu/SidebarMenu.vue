<template>
    <ul class="sidebar-menu">
        <li v-for="(item, index) in navigation" :key="'item'+index">
            <a :href="item.href" @click="item.open=!item.open">
                <i v-if="item.icon"
                   :class="[{'fa': true}, item.icon ? 'fa-' + item.icon : '']">
                </i>
                {{ item.title }}
                <i class="fa arrow" v-if="item.children"></i>
            </a>
            <sidebar-item-menu v-if="item.children"
                               :list="item"
                               :open="item.open"/>
        </li>
    </ul>
</template>

<script>
    import SidebarItemMenu from "./SidebarItemMenu";
    import Vuex from "vuex";

    export const store = new Vuex.Store({
        state: {
            navigation: [
                {
                    title: 'Dashboard',
                    open: false,
                    icon: 'home',
                    href: 'dashboard'
                },
                {
                    title: 'Menu Levels',
                    open: false,
                    icon: 'sitemap',
                    children: [
                        {
                            title: 'Second Level Item',
                            open: false,
                            children: [
                                {
                                    title: 'Third Level Item (1)',
                                },
                                {
                                    title: 'Third Level Item (2)',
                                },
                            ]
                        },
                        {
                            title: 'Second Level Item',
                            icon: 'github-alt',
                        },
                        {
                            title: 'Second Level Item',
                            open: false,
                            children: [
                                {
                                    title: 'Third Level Item',
                                },
                                {
                                    title: 'Third Level Item',
                                },
                                {
                                    title: 'Third Level Item',
                                    open: false,
                                    children: [
                                        {
                                            title: 'Fourth Level Item (1)',
                                        },
                                        {
                                            title: 'Fourth Level Item (2)',
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                },
                {
                    title: 'Pages',
                    open: false,
                    icon: 'camera',
                    children: [
                        {
                            title: 'Login',
                            icon: 'key',
                        },
                        {
                            title: 'Reset',
                        }
                    ]
                }
            ]
        },
    });

    export default {
        components: {
            SidebarItemMenu
        },
        computed: {
            navigation() {
                return store.state.navigation;
            }
        }
    }
</script>
