import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import moment from "moment";
import ReactHtmlParser from "react-html-parser";

export default function AnnounceCard({ announcement }) {
    return (
        <div className="col-sm-12 col-lg-4 mt-4">
            <div
                className="announce-card card-effect"
                style={{ height: "100%" }}
            >
                <img
                    className="shout-icon document-card"
                    src="/assets/images/icons/shout.svg"
                    alt=""
                />

                <InertiaLink
                    href={`/announcements/${
                        announcement ? announcement.id : "#"
                    }`}
                    style={{ textDecoration: "none" }}
                >
                    <div className="limit-1-lines">
                        <div>
                            <h4
                                className="mt-3 text-center"
                                style={{ color: "#2a9df4" }}
                            >
                                {announcement ? announcement.title : ""}
                            </h4>
                        </div>
                    </div>
                </InertiaLink>

                <div className="limit-3-lines text-center">
                    <div>
                        {ReactHtmlParser(
                            announcement ? announcement.description : ""
                        )}
                    </div>
                </div>

                <h6
                    className="mt-2 text-center"
                    style={{
                        fontWeight: "bold",
                        width: "100%",
                        margin: "auto 0",
                        color: "black"
                    }}
                >
                    {announcement
                        ? moment(announcement.created_at).fromNow()
                        : ""}
                </h6>
            </div>
        </div>
    );
}
