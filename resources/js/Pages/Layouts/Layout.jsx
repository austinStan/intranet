import React, { useEffect } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

// Components
import Navbar from "../../components/Navigation/Navbar";
import Sidebar from "../../components/Navigation/Sidebar";
import Footer from "../../components/Navigation/Footer";

export default function Layout({ title, children }) {
    useEffect(() => {
        document.title = title;
    }, [title]);

    return (
        <div>
            <main>
                <div className="">
                    <Navbar />
                </div>

                <div>{children}</div>
            </main>

            <Footer />
        </div>
    );
}
