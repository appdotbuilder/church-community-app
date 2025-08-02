import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Church Community">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-gradient-to-br from-blue-50 to-white p-6 text-[#1b1b18] lg:justify-center lg:p-8">
                <header className="mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
                    <nav className="flex items-center justify-end gap-4">
                        {auth.user ? (
                            <Link
                                href={route('dashboard')}
                                className="inline-block rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 transition-colors"
                            >
                                🏠 Go to Community
                            </Link>
                        ) : (
                            <>
                                <Link
                                    href={route('login')}
                                    className="inline-block rounded-md border border-blue-200 px-5 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 transition-colors"
                                >
                                    🔐 Log in
                                </Link>
                                <Link
                                    href={route('register')}
                                    className="inline-block rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 transition-colors"
                                >
                                    ✋ Join Community
                                </Link>
                            </>
                        )}
                    </nav>
                </header>
                <div className="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow">
                    <main className="flex w-full max-w-[335px] flex-col lg:max-w-6xl lg:flex-row lg:items-center lg:gap-12">
                        <div className="flex-1 text-center lg:text-left">
                            <div className="text-6xl mb-6">⛪</div>
                            <h1 className="mb-6 text-4xl lg:text-6xl font-bold text-blue-900">
                                Church Community Platform
                            </h1>
                            <p className="mb-8 text-lg lg:text-xl text-gray-700 leading-relaxed">
                                Stay connected with your church family. Access schedules, devotionals, 
                                care lists, and community updates all in one place.
                            </p>

                            <div className="grid gap-4 mb-8 text-left">
                                <div className="flex items-start gap-3">
                                    <span className="text-2xl">📅</span>
                                    <div>
                                        <h3 className="font-semibold text-blue-900">Weekly Schedules</h3>
                                        <p className="text-gray-600">Sunday services, congregational groups, and special events</p>
                                    </div>
                                </div>
                                <div className="flex items-start gap-3">
                                    <span className="text-2xl">❤️</span>
                                    <div>
                                        <h3 className="font-semibold text-blue-900">Diakonia Care</h3>
                                        <p className="text-gray-600">Prayer lists and care information for members in need</p>
                                    </div>
                                </div>
                                <div className="flex items-start gap-3">
                                    <span className="text-2xl">📖</span>
                                    <div>
                                        <h3 className="font-semibold text-blue-900">Weekly Devotionals</h3>
                                        <p className="text-gray-600">Spiritual guidance and biblical reflections</p>
                                    </div>
                                </div>
                                <div className="flex items-start gap-3">
                                    <span className="text-2xl">💰</span>
                                    <div>
                                        <h3 className="font-semibold text-blue-900">Financial Transparency</h3>
                                        <p className="text-gray-600">Open access to contribution reports and church finances</p>
                                    </div>
                                </div>
                            </div>

                            {!auth.user && (
                                <div className="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                    <Link
                                        href={route('login')}
                                        className="inline-block rounded-lg bg-blue-600 px-8 py-3 text-white font-semibold hover:bg-blue-700 transition-colors text-center"
                                    >
                                        🔐 Member Login
                                    </Link>
                                    <Link
                                        href={route('register')}
                                        className="inline-block rounded-lg border-2 border-blue-600 px-8 py-3 text-blue-600 font-semibold hover:bg-blue-50 transition-colors text-center"
                                    >
                                        ✋ Join Our Community
                                    </Link>
                                </div>
                            )}

                            {auth.user && (
                                <div className="text-center lg:text-left">
                                    <Link
                                        href={route('dashboard')}
                                        className="inline-block rounded-lg bg-green-600 px-8 py-3 text-white font-semibold hover:bg-green-700 transition-colors"
                                    >
                                        🏠 Enter Community Portal
                                    </Link>
                                </div>
                            )}
                        </div>

                        <div className="flex-1 mt-8 lg:mt-0">
                            <div className="bg-white rounded-xl shadow-xl p-6 border border-blue-100">
                                <div className="text-center mb-6">
                                    <h3 className="text-xl font-bold text-blue-900 mb-2">📊 Community Features</h3>
                                    <div className="grid grid-cols-2 gap-4 text-sm">
                                        <div className="bg-blue-50 p-3 rounded-lg">
                                            <div className="text-2xl mb-1">👥</div>
                                            <div className="font-medium">15+ Groups</div>
                                            <div className="text-gray-600">Congregational</div>
                                        </div>
                                        <div className="bg-green-50 p-3 rounded-lg">
                                            <div className="text-2xl mb-1">✨</div>
                                            <div className="font-medium">Special Events</div>
                                            <div className="text-gray-600">Sacraments</div>
                                        </div>
                                        <div className="bg-red-50 p-3 rounded-lg">
                                            <div className="text-2xl mb-1">🙏</div>
                                            <div className="font-medium">Prayer List</div>
                                            <div className="text-gray-600">Care Ministry</div>
                                        </div>
                                        <div className="bg-yellow-50 p-3 rounded-lg">
                                            <div className="text-2xl mb-1">📢</div>
                                            <div className="font-medium">Announcements</div>
                                            <div className="text-gray-600">Church News</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div className="border-t pt-4">
                                    <div className="text-center text-sm text-gray-600">
                                        <div className="flex justify-center items-center gap-2 mb-2">
                                            <span className="w-3 h-3 bg-green-500 rounded-full"></span>
                                            <span>Active Community Platform</span>
                                        </div>
                                        <p>Optimized for seniors 60+ • Mobile-friendly • Secure</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                
                <footer className="mt-12 text-sm text-gray-500 text-center">
                    Built with ❤️ for our church community
                </footer>
            </div>
        </>
    );
}