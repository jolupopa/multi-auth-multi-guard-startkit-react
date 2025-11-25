
import AppLayout from '@/layouts/app-layout';
import { tasks } from '@/routes/agent';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tareas',
        href: tasks().url,
    },
];

export default function Tasks() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Tareas" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <p>Lista de tareas</p>   
            </div>
        </AppLayout>
    );
}
