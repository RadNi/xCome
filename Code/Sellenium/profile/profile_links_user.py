import unittest

from selenium import webdriver
from test_utility import static_data
from test_utility import fields


class UserPage(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=smjfas", "password=smjfas",
                                                    "submit"])[2].click()

    def test_profile_main_page(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPages").click()
        driver.find_element_by_id("mainpage").click()

        assert "profile" in driver.current_url

    def test_profile_user_information(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPages").click()
        driver.find_element_by_id("userinfo").click()

        assert "info" in driver.current_url

    def test_profile_transaction_history(self):
        driver = self.driver
        driver.get(static_data.base_url + "profile")
        driver.find_element_by_id("navbarDropdownPages").click()
        driver.find_element_by_id("transactions").click()

        assert "transactions" in driver.current_url

    def tearDown(self):
        self.driver.close()
