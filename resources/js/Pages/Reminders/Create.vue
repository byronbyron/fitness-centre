<template>
    <layout>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><inertia-link :href="$route('lead.index')">Leads</inertia-link></li>
                    <li class="breadcrumb-item"><inertia-link :href="$route('lead.view', {lead: lead})">Lead Details</inertia-link></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Reminder</li>
                </ol>
            </nav>

            <h1 class="mb-4">Add Reminder</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="h5 mb-0">Reminder Details</h2>
                </div>

                <div class="card-body">
                    <reminder-form
                        :lead="lead"
                        :main-reminder="reminder"
                        @reminderSubmit="handleSubmit"
                    ></reminder-form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout';
import ReminderForm from './Form';

export default {
    components: { Layout, ReminderForm },

    props: { lead: Object },

    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: ''
            }
        }
    },

    methods: {
        handleSubmit(data) {
            data.lead_id = this.lead.id;

            this.$inertia.post(route('reminder.store'), data);
        }
    }
};
</script>
