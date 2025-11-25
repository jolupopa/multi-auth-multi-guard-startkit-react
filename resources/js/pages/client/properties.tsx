
import AppLayout from '@/layouts/app-layout';
import { properties } from '@/routes/client';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Propiedades',
        href: properties().url,
    },
];

export default function Properties() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Propiedades" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <p>Lista de propiedades</p>   
            </div>
        </AppLayout>
    );
}
