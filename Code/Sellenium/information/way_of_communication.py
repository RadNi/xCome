import unittest

from selenium import webdriver

from test_utility import static_data, fields


class Communication(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.address = "user/information"

    def test_communication(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        ways = fields.get_components_by_name(driver, ["smsReport", "tgReport", "emailReport",
                                                      "change"])
        ways[0].click()
        ways[1].click()
        ways[3].click()
        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
