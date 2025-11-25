
import AppLayout from '@/layouts/app-layout';
import { agents } from '@/routes/company';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Agentes',
        href: agents().url,
    },
];

export default function Agents() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Agentes" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <p>Lista de agentes</p>   
            </div>
        </AppLayout>
    );
}
