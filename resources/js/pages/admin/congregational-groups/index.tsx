import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { router } from '@inertiajs/react';

interface CongregationalGroup {
    id: number;
    name: string;
    description?: string;
    schedule?: Record<string, unknown>[];
    is_active: boolean;
    created_at: string;
    updated_at: string;
}

interface PaginationData {
    data: CongregationalGroup[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    from: number;
    to: number;
}

interface Props {
    groups: PaginationData;
    [key: string]: unknown;
}

export default function CongregationalGroupsIndex({ groups }: Props) {
    const goToAdmin = () => {
        router.get('/admin');
    };

    const createGroup = () => {
        router.get('/admin/congregational-groups/create');
    };

    const viewGroup = (groupId: number) => {
        router.get(`/admin/congregational-groups/${groupId}`);
    };

    const editGroup = (groupId: number) => {
        router.get(`/admin/congregational-groups/${groupId}/edit`);
    };

    const deleteGroup = (groupId: number) => {
        if (confirm('Are you sure you want to delete this congregational group?')) {
            router.delete(`/admin/congregational-groups/${groupId}`);
        }
    };

    return (
        <AppShell>
            <div className="min-h-screen bg-gradient-to-br from-gray-50 to-white">
                <div className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-12">
                    <div className="max-w-6xl mx-auto px-4">
                        <div className="flex items-center justify-between">
                            <div>
                                <h1 className="text-4xl font-bold mb-2">
                                    🏘️ Congregational Groups
                                </h1>
                                <p className="text-blue-100 text-lg">
                                    Manage the church's 15 congregational groups
                                </p>
                            </div>
                            <div className="flex gap-3">
                                <Button 
                                    variant="secondary" 
                                    onClick={goToAdmin}
                                    className="bg-white/10 text-white hover:bg-white/20"
                                >
                                    ← Admin Panel
                                </Button>
                                <Button 
                                    variant="secondary"
                                    onClick={createGroup}
                                    className="bg-green-600 text-white hover:bg-green-700"
                                >
                                    ➕ Add New Group
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="max-w-6xl mx-auto px-4 py-8">
                    <Card className="mb-6">
                        <CardHeader>
                            <CardTitle className="flex items-center justify-between">
                                📊 Groups Overview
                                <Badge variant="secondary" className="text-lg px-3 py-1">
                                    {groups.total} Total Groups
                                </Badge>
                            </CardTitle>
                            <CardDescription>
                                Showing {groups.from}-{groups.to} of {groups.total} congregational groups
                            </CardDescription>
                        </CardHeader>
                    </Card>

                    <div className="grid gap-6">
                        {groups.data.map((group) => (
                            <Card key={group.id} className="hover:shadow-md transition-shadow">
                                <CardHeader>
                                    <div className="flex items-start justify-between">
                                        <div>
                                            <CardTitle className="text-xl mb-2">
                                                {group.name}
                                            </CardTitle>
                                            {group.description && (
                                                <CardDescription className="text-base">
                                                    {group.description}
                                                </CardDescription>
                                            )}
                                        </div>
                                        <div className="flex items-center gap-2">
                                            <Badge 
                                                variant={group.is_active ? "default" : "secondary"}
                                                className={group.is_active ? "bg-green-100 text-green-800" : "bg-gray-100 text-gray-600"}
                                            >
                                                {group.is_active ? "Active" : "Inactive"}
                                            </Badge>
                                        </div>
                                    </div>
                                </CardHeader>
                                <CardContent>
                                    <div className="flex items-center justify-between">
                                        <div className="text-sm text-gray-600">
                                            <p>Created: {new Date(group.created_at).toLocaleDateString()}</p>
                                            {group.schedule && group.schedule.length > 0 && (
                                                <p className="mt-1">
                                                    📅 {group.schedule.length} schedule(s) configured
                                                </p>
                                            )}
                                        </div>
                                        <div className="flex gap-2">
                                            <Button 
                                                size="sm" 
                                                variant="outline"
                                                onClick={() => viewGroup(group.id)}
                                            >
                                                👁️ View
                                            </Button>
                                            <Button 
                                                size="sm" 
                                                variant="outline"
                                                onClick={() => editGroup(group.id)}
                                            >
                                                ✏️ Edit
                                            </Button>
                                            <Button 
                                                size="sm" 
                                                variant="outline"
                                                onClick={() => deleteGroup(group.id)}
                                                className="text-red-600 hover:text-red-700 hover:bg-red-50"
                                            >
                                                🗑️ Delete
                                            </Button>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        ))}
                    </div>

                    {groups.data.length === 0 && (
                        <Card>
                            <CardContent className="text-center py-12">
                                <div className="text-6xl mb-4">🏘️</div>
                                <h3 className="text-xl font-semibold mb-2">No Groups Found</h3>
                                <p className="text-gray-600 mb-6">
                                    Start by creating your first congregational group.
                                </p>
                                <Button onClick={createGroup} size="lg">
                                    ➕ Create First Group
                                </Button>
                            </CardContent>
                        </Card>
                    )}

                    {/* Pagination */}
                    {groups.last_page > 1 && (
                        <div className="mt-8 flex justify-center gap-2">
                            {groups.current_page > 1 && (
                                <Button 
                                    variant="outline"
                                    onClick={() => router.get('/admin/congregational-groups', { page: groups.current_page - 1 })}
                                >
                                    ← Previous
                                </Button>
                            )}
                            
                            <Badge variant="secondary" className="px-4 py-2">
                                Page {groups.current_page} of {groups.last_page}
                            </Badge>
                            
                            {groups.current_page < groups.last_page && (
                                <Button 
                                    variant="outline"
                                    onClick={() => router.get('/admin/congregational-groups', { page: groups.current_page + 1 })}
                                >
                                    Next →
                                </Button>
                            )}
                        </div>
                    )}
                </div>
            </div>
        </AppShell>
    );
}