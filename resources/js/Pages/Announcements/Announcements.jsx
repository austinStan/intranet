import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

import AnnounceCard from "../../components/AnnounceCard";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

function Announcements({ announcements }) {
    // console.log(announcements);

    nProgress.start();
    // useEffect(() => {
    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section className="announcements-section">
            <div>
                <Banner title="Announcements" />

                <div className="">
                    <nav aria-label="breadcrumb " style={{ paddingTop: "0px" }}>
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/announcements" aria-current="page">
                                    Announcements
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="" style={{ margin: "0 8%" }}>
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        {announcements && announcements.length > 0 ? (
                            <div className="row">
                                {announcements.map(announcement => (
                                    <AnnounceCard
                                        key={announcement.id}
                                        announcement={announcement}
                                    />
                                ))}
                            </div>
                        ) : (
                            // </div>
                            <h3
                                className="text-center"
                                style={{
                                    fontWeight: "bold",
                                    color: "#2a9df4",
                                    marginTop: "50px"
                                }}
                            >
                                No announcements available
                            </h3>
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}

Announcements.layout = page => (
    <Layout children={page} title="Announcements | Kampala Hospital" />
);

export default Announcements;
