<template>
    <div class="row paginate">
        <div class="col-md-3" v-if="from && to && total">
            <p class="mt-1">Showing {{ from }} to {{ to }} of {{ total }} entries</p>
        </div>
        <div :class="from && to && total ? 'col-md-9' : 'col-md-12'">
            <nav v-if="links.length > 3">
                <ul class="pagination">
                    <template v-for="link in links">
                        <li v-if="link.url === null" aria-current="page" class="page-item disabled">
                            <span class="page-link" v-html="link.label"></span>
                        </li>
                        <li v-else class="page-item" :class="{'active': link.active}">
                            <a style="cursor: pointer" @click="pageChange(link.label)" class="page-link" v-html="link.label"></a>
                        </li>
                    </template>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>

export default {
    name: "Pagination",

    props: {
        links: Array,
        currentPage: Number,
        from: Number,
        to: Number,
        total: Number,
    },

    methods: {
        pageChange(page) {
            if (page === 'Next &raquo;') {
                page = this.currentPage + 1
            } else if (page === '&laquo; Previous') {
                page = this.currentPage - 1
            }
            this.$emit('changepage', page)
        }
    }
}
</script>

<style scoped>
.paginate {
    padding: 10px;
}
.pagination {
    float: right;
}
</style>
