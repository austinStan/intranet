import React, { useState, useEffect } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

export default function Footer() {
    // const [announcements, setAnnouncements] = useState([]);
    // const [documents, setDocuments] = useState([]);
    // const [events, setEvents] = useState([]);
    // const [news, setNews] = useState([]);
    const [allData, setAllData] = useState([]);

    useEffect(() => {
        const abortController = new AbortController();

        fetch("/api/v1/latest")
            .then(response => response.json())
            .then(data => {
                // setAnnouncements(data.latest_announcements);
                // setDocuments(data.latest_documents);
                // setEvents(data.latest_events);
                // setNews(data.latest_news);
                setAllData([data]);
            })
            .catch(error => console.log(error));

        return () => {
            abortController.abort();
        };
    }, []);

    // console.log(announcements);
    // console.log(documents);
    // console.log(events);
    // console.log(news);
    // console.log(allData);

    return (
        <div
            className="mt-5 pt-5 text-white"
            style={{ backgroundColor: "#2a9df4" }}
        >
            <footer>
                <div style={{ margin: "0 5%" }}>
                    <div className="row">
                        <div className="col-sm-12 col-md-6 col-lg-3">
                            <h5>Latest Announcements</h5>

                            <div>
                                {allData && allData.length > 0 ? (
                                    <>
                                        {allData[0].latest_announcements.map(
                                            announce => (
                                                <InertiaLink
                                                    href={`announcements/${
                                                        announce
                                                            ? announce.id
                                                            : ""
                                                    }`}
                                                    style={{ color: "white" }}
                                                >
                                                    <p key={announce.id}>
                                                        {announce.title}
                                                    </p>
                                                </InertiaLink>
                                            )
                                        )}
                                    </>
                                ) : (
                                    <p>No latest announcement</p>
                                )}
                            </div>
                        </div>

                        <div className="col-sm-12 col-md-6 col-lg-3">
                            <h5>Latest Documents</h5>

                            <div>
                                {allData && allData.length > 0 ? (
                                    <>
                                        {allData[0].latest_documents.map(
                                            document => (
                                                <InertiaLink
                                                    href={`documents/${
                                                        document
                                                            ? document.id
                                                            : ""
                                                    }`}
                                                    style={{ color: "white" }}
                                                >
                                                    <p key={document.id}>
                                                        {document.name}
                                                    </p>
                                                </InertiaLink>
                                            )
                                        )}
                                    </>
                                ) : (
                                    <p>No latest documents</p>
                                )}
                            </div>
                        </div>

                        <div className="col-sm-12 col-md-6 col-lg-3">
                            <h5>Upcoming Events</h5>

                            <div>
                                {allData && allData.length > 0 ? (
                                    <>
                                        {allData[0].latest_events.map(event => (
                                            <InertiaLink
                                                href={`events/${
                                                    event ? event.id : ""
                                                }`}
                                                style={{ color: "white" }}
                                            >
                                                <p key={event.id}>
                                                    {event.title}
                                                </p>
                                            </InertiaLink>
                                        ))}
                                    </>
                                ) : (
                                    <p>No upcoming events</p>
                                )}
                            </div>
                        </div>

                        <div className="col-sm-12 col-md-6 col-lg-3">
                            <h5>Latest News</h5>

                            <div>
                                {allData && allData.length > 0 ? (
                                    <>
                                        {allData[0].latest_news.map(news => (
                                            <InertiaLink
                                                href={`news/${
                                                    news ? news.id : ""
                                                }`}
                                                style={{ color: "white" }}
                                            >
                                                <p key={news.id}>
                                                    {news.title}
                                                </p>
                                            </InertiaLink>
                                        ))}
                                    </>
                                ) : (
                                    <p>No latest news</p>
                                )}
                            </div>
                        </div>
                    </div>
                </div>

                <div className="mt-5 " style={{ height: "100px" }}>
                    <hr className="text-dark bg-white" />
                    <p className="footer text-center">
                        Copyright &copy; {new Date().getFullYear()} | Kampala
                        Hospital
                    </p>
                </div>
            </footer>
        </div>
    );
}
