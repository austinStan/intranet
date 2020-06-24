import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";

import { InertiaLink } from "@inertiajs/inertia-react";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

// Import Components
import HomeSlider from "../../components/HomeSlider";
import Announcement from "../../components/Announcement";
import LatestNewsCard from "../../components/LatestNewsCard";
import StaffSmallCard from "../../components/StaffSmallCard";
import Event from "../../components/Event";
import Document from "../../components/Document";
import StaffCard from "../../components/StaffCard";
import ReadAll from "../../components/ReadAll";
import FamousEmployeeSlider from "../../components/FamousEmployeeSlider";
import IncidenceReporting from "../../components/IncidenceReporting";
import StaffMembers from "../../components/StaffMembers";
import Sidebar from "../../components/Navigation/Sidebar";

const Home = props => {
    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, [props]);

    const {
        announcements,
        news,
        documents,
        events,
        newest_staff,
        famous_staff,
        departments,
        internal_systems,
        user_id,
        intro_text
    } = props;
    // console.log(famous_staff[0]);
    // console.log(internal_systems);

    return (
        <div>
            <div style={{ height: "500px" }}>
                <img
                    className="landing-doc-image img-fluid"
                    src="/assets/images/bg1.jpg"
                    style={{
                        height: "100%"
                    }}
                    alt="Landing Page Image"
                />

                <div className="landing-text-background">
                    <h1 className="landing-text text-center">
                        {intro_text ? intro_text.intro_text : ""}
                    </h1>
                </div>

                {/* <HomeSlider /> */}
            </div>

            <section className="" style={{ margin: "0 10%" }}>
                <div className="">
                    {/* Start Announcements and Latest News */}
                    <section>
                        <div className="row mt-5">
                            <div className="col-sm-12 col-lg-2 mt-5">
                                <Sidebar />
                            </div>

                            <div className="col-sm-12 col-lg-5 mt-5">
                                <div className="announcements">
                                    <div className="row mt-2 mb-3">
                                        <h4 className="col-8 mb-3 section-headings">
                                            Latest Announcements
                                        </h4>

                                        <ReadAll
                                            title="Read All"
                                            link="announcements"
                                        />
                                    </div>

                                    {announcements &&
                                    announcements.length > 0 ? (
                                        <>
                                            {announcements.map(announcement => (
                                                <Announcement
                                                    key={announcement.id}
                                                    announcement={announcement}
                                                />
                                            ))}
                                        </>
                                    ) : (
                                        <h3>No announcements available</h3>
                                    )}

                                    {/* <Announcement /> */}
                                    {/* <Announcement /> */}
                                </div>
                            </div>

                            <div
                                className="cl-sm-12 col-lg-5 mt-5"
                                style={{ backgroundColor: "white" }}
                            >
                                <div style={{ margin: "20px" }}>
                                    <div className="row mt-2 mb-3">
                                        <h4 className="col-8 section-headings">
                                            Latest News
                                        </h4>
                                        <ReadAll title="Read All" />
                                    </div>

                                    {news && news.length > 0 ? (
                                        <>
                                            {news.map(n => (
                                                <LatestNewsCard
                                                    key={n.id}
                                                    n={n}
                                                />
                                            ))}
                                        </>
                                    ) : (
                                        <h3
                                            className="text-center"
                                            style={{
                                                color: "#2a9df4",
                                                fontWeight: "bold"
                                            }}
                                        >
                                            No news available
                                        </h3>
                                    )}
                                </div>
                            </div>
                        </div>
                    </section>
                    {/* End Announcements and Latest News */}

                    {/* Start New Staff And Documents */}
                    <section className="container">
                        <div className="row">
                            <div className="col-sm-12 col-md-6">
                                <div className="row mt-5">
                                    <h4 className="col-8 section-headings">
                                        New Documents
                                    </h4>
                                    <ReadAll
                                        link="documents"
                                        title="Read All"
                                    />
                                </div>

                                {documents && documents.length > 0 ? (
                                    <>
                                        {documents.map(document => (
                                            <Document
                                                key={document.id}
                                                document={document}
                                            />
                                        ))}
                                    </>
                                ) : (
                                    <h3
                                        className="text-center mt-5"
                                        style={{
                                            color: "#2a9df4",
                                            fontWeight: "bold"
                                        }}
                                    >
                                        No Documents available
                                    </h3>
                                )}
                            </div>

                            <div className="col-sm-12 col-md-6">
                                <div className="row mt-5">
                                    <h4 className="col-8 section-headings">
                                        Upcoming Events
                                    </h4>
                                    <ReadAll title="View" />
                                </div>

                                {events && events.length > 0 ? (
                                    <>
                                        {events.map(event => (
                                            <Event
                                                key={event.id}
                                                event={event}
                                            />
                                        ))}
                                    </>
                                ) : (
                                    <h3
                                        className="text-center mt-5"
                                        style={{
                                            color: "#2a9df4",
                                            fontWeight: "bold"
                                        }}
                                    >
                                        No Events available
                                    </h3>
                                )}
                            </div>
                        </div>
                    </section>
                    {/* End New Staff And Documents */}

                    {/* Start New Section */}
                    <section style={{ marginTop: "35px" }}>
                        <div className="container mt-5">
                            <div className="row">
                                <div className="col-sm-12 col-md-6 mt-5">
                                    <div className="" style={{}}>
                                        <div
                                            className=""
                                            style={{ width: "100%" }}
                                        >
                                            <h3 className="section-headings">
                                                Departments
                                            </h3>

                                            {departments &&
                                            departments.length > 0 ? (
                                                <div className="row">
                                                    {departments.map(dept => (
                                                        <div
                                                            className="col-sm-12 "
                                                            style={{
                                                                padding: "10px",
                                                                backgroundColor:
                                                                    "white",
                                                                marginTop:
                                                                    "10px"
                                                            }}
                                                        >
                                                            <InertiaLink
                                                                href={`departments/${
                                                                    dept.id
                                                                        ? dept.id
                                                                        : ""
                                                                }`}
                                                            >
                                                                <h3>
                                                                    {dept.name}
                                                                </h3>
                                                            </InertiaLink>

                                                            <p>
                                                                View all staff
                                                                and other
                                                                information
                                                                under this
                                                                department
                                                            </p>
                                                        </div>
                                                    ))}
                                                </div>
                                            ) : (
                                                <h3>
                                                    No Departments Available
                                                </h3>
                                            )}
                                        </div>
                                    </div>
                                </div>

                                <div className="col-sm-12 col-md-6 mt-5">
                                    <IncidenceReporting user_id={user_id} />
                                </div>
                            </div>
                        </div>
                    </section>
                    {/* End New Section */}

                    {/* Start Wall Of Fame Section */}
                    <section>
                        <div className="mt-5" id="departments">
                            <div className="">
                                <div className="row">
                                    <div className="col-9">
                                        <h4 className=" mt-3 section-headings">
                                            New Staff Members
                                        </h4>
                                    </div>

                                    <ReadAll title="All Staff" link="staff" />
                                </div>

                                <div className="" style={{}}>
                                    <div
                                        className="row mt-3"
                                        style={
                                            {
                                                // backgroundColor: "white"
                                                // padding: "5px"
                                            }
                                        }
                                    >
                                        {newest_staff &&
                                        newest_staff.length > 0 ? (
                                            <>
                                                {newest_staff.map(staff => (
                                                    <div className="mt-5 col-sm-12 col-md-4">
                                                        <div
                                                            style={{
                                                                margin: "0 10px"
                                                            }}
                                                        >
                                                            <img
                                                                className="img-fluid"
                                                                src={
                                                                    staff.image
                                                                }
                                                                alt=""
                                                                style={{
                                                                    height:
                                                                        "300px",
                                                                    width:
                                                                        "100%"
                                                                }}
                                                            />

                                                            <h4 className="text-center mt-2">
                                                                {staff.name}
                                                            </h4>

                                                            <h6 className="text-center">
                                                                {staff.email}
                                                            </h6>

                                                            <p className="text-center">
                                                                {
                                                                    staff.department
                                                                }
                                                            </p>
                                                        </div>
                                                    </div>
                                                ))}
                                            </>
                                        ) : (
                                            <h3>No Staff Members available</h3>
                                        )}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {/* End Wall Of Fame Section */}
                </div>
            </section>
        </div>
    );
};

Home.layout = page => (
    <Layout children={page} title="Home | Kampala Hospital" />
);

export default Home;
