import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";

import EventsCard from "../../components/EventsCard";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

function Events({ events }) {
    // console.log(events);

    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section style={{}}>
            <div>
                <Banner title="Upcoming Events" />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/events" aria-current="page">
                                    Events
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
                        {events && events.length > 0 ? (
                            <div>
                                <h1 className="single-page-headings">
                                    Upcoming Events
                                </h1>

                                <div className="row">
                                    {events.map(event => (
                                        <EventsCard
                                            key={event.id}
                                            event={event}
                                        />
                                    ))}
                                </div>
                            </div>
                        ) : (
                            <h3
                                className="text-center"
                                style={{ color: "#2a9df4", fontWeight: "bold" }}
                            >
                                No Events available
                            </h3>
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}

Events.layout = page => (
    <Layout children={page} title="Events | Kampala Hospital" />
);

export default Events;
