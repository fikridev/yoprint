<template>
        <table class="table">
            <tbody>
                <tr v-for="(job, index) in allJobs" :key="index" v-bind:class="{success: job.run, danger: !job.run}">
                    <td width="80%">{{ job.description }}</td>
                    <td>{{ job.created_at }}</td>
                </tr>
            </tbody>
        </table>
</template>
    
<script>

export default {
    name: 'Jobs',
    props: ['jobs'],
    data() {
        return {allJobs: this.jobs}
    },
    created() {
        let vm = this
        vm.refreshAllJobs = (e) => axios.get('/jobs').then((e) => (vm.allJobs = e.data))
        Echo.channel('update-import-status-queued')
            .listen('.queued', (e)  => vm.refreshAllJobs(e))
            .listen('.completed', (e) => vm.refreshAllJobs(e))
    }
}
</script>