<template>
    <layout>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><inertia-link :href="$route('lead.index')">Leads</inertia-link></li>
                    <li class="breadcrumb-item"><inertia-link :href="$route('lead.view', {lead: lead})">Lead Details</inertia-link></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Note</li>
                </ol>
            </nav>

            <h1 class="mb-4">Add Note</h1>

            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">Details</h2>
                </div>

                <div class="card-body">
                    <form @submit.prevent="handleAddNote">
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" class="form-control" :class="{ 'is-invalid': $page.errors.note }" v-model="note"></textarea>
                            <div v-if="$page.errors.note" class="invalid-feedback">{{ $page.errors.note[0] }}</div>
                        </div>

                        <button class="btn btn-primary">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '../../Shared/Layout';

    export default {
        components: { Layout },

        props: {
            lead: Object,
            reminder: Object
        },

        data() {
            return {
                note: ''
            }
        },

        methods: {
            handleAddNote() {
                const data = {
                    reminder_id: this.reminder.id,
                    note: this.note
                }

                this.$inertia.post(route('reminder.close'), data);
            }
        }
    }
</script>
